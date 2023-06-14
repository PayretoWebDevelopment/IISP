<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use ZipArchive;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Report;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use App\Exports\TimesheetsExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Excel; //alias for maatwebsite excel package
use PDF; //alias for dompdf (refer to config/app.php)

//use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    // Create a new function to convert the string returned by getDurationAttribute() to hours
    public function getHours($timesheet)
    {
        $hours = explode(':', $timesheet->getDurationAttribute());

        $hours = intval($hours[0]) * 3600 + intval($hours[1]) * 60 + intval($hours[2]);

        return $hours;
    }

    public function index(Request $request)
    {
        $this->ensureExportsDeleted();
        if ($request->user()->isAdmin()) {
            $users = User::where('role', '=', 'intern')->get();
            $timesheets = Timesheet::whereHas('user', function ($query) {
                $query->where('role', '=', 'intern');
            })->get();
            // dd($users, $timesheets);

            // Group the timesheets by user
            $timesheetsByUser = $timesheets->groupBy('user_id');

            // For each timesheet, call the function to convert the string returned by getDurationAttribute() to hours
            foreach ($timesheetsByUser as $user => $timesheets) {
                $totalHoursRendered = $timesheets->sum(function ($timesheet) {
                    return $this->getHours($timesheet);
                });
                $userReference = User::find($user);

                // Add the sum of rendered hours to the table blade file
                $timesheetsByUser[$user]['total_hours_rendered'] = $totalHoursRendered;
                $timesheetsByUser[$user]['userReference'] = $userReference;
            }

            // dd($timesheetsByUser);

            return view('admin.reports', compact('timesheetsByUser', 'timesheets', 'users'));
        } else {
            $user_id = auth()->user()->id;
            $timesheets = Timesheet::where('user_id', $user_id)
                ->orderBy('start_time', 'desc')
                ->orderBy('end_time', 'desc')
                ->get();

            foreach ($timesheets as $index => $timesheet) {
                $timesheets[$index]->rate = $this->computeRate($user_id, $timesheet);
            }
            return view('intern.reports',  compact('timesheets'));
        }
    }

    public function inspect($id, Request $request)
    {
        $user = User::find($id);
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');
        // dd($id, $user);
        // dd($request->all());
        $timesheets = Timesheet::whereHas('user', function ($query) {
            $query->where('role', '=', 'intern');
        })
        ->where(function ($query) use ($start_date) {
            if ($start_date) {
                return $query->whereDate('start_time', '>=', $start_date);
            }
        })
        ->where(function ($query) use ($end_date) {
            if ($end_date) {
                return $query->whereDate('start_time', '<=', $end_date);
            }
        })
        ->where('user_id', '=', $id)
        ->get();

        foreach ($timesheets as $index => $timesheet) {
            $timesheets[$index]->rate = $this->computeRate($id, $timesheet);
        }
        // dd($timesheets);
        return view('admin.inspect', compact('timesheets', 'start_date', 'end_date', 'user'));
    }

    //Filter by date
    public function filter(Request $request)
    {
        $this->ensureExportsDeleted();
        if ($request->user()->isAdmin()) {
            $users = User::all();

            $start_date = $request->input('start_date');

            $end_date = $request->input('end_date');

            // dd($request->all());

            $timesheets = Timesheet::whereHas('user', function ($query) {
                $query->where('role', '=', 'intern');    
                })->with('user')->when($start_date, function ($query, $start_date) {
                    return $query->whereDate('start_time', '>=', $start_date);
                })->when($end_date, function ($query, $end_date) {
                        return $query->whereDate('start_time', '<=', $end_date);
                })
                ->orderBy('start_time', 'desc')
                ->orderBy('end_time', 'desc')
                ->get();

            // Group the timesheets by user
            $timesheetsByUser = $timesheets->groupBy('user_id');
            
            // For each timesheet, call the function to convert the string returned by getDurationAttribute() to hours
            foreach ($timesheetsByUser as $user => $timesheets) {
                $totalHoursRendered = $timesheets->sum(function ($timesheet) {
                    return $this->getHours($timesheet);
                    
                });
                $userReference = User::find($user);

                // Add the sum of rendered hours to the table blade file
                $timesheetsByUser[$user]['total_hours_rendered'] = $totalHoursRendered;
                $timesheetsByUser[$user]['userReference'] = $userReference;
            }
                return view('admin.reports', compact('timesheetsByUser', 'timesheets', 'users'));
            }

            
        else {
            $user_id = auth()->user()->id;
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            $timesheets = Timesheet::where('user_id', $user_id)
                ->when($start_date, function ($query, $start_date) {
                    return $query->whereDate('start_time', '>=', $start_date);
                })
                ->when($end_date, function ($query, $end_date) {
                    return $query->whereDate('end_time', '<=', $end_date);
                })
                ->orderBy('start_time', 'desc')
                ->orderBy('end_time', 'desc')
                ->get();

            foreach ($timesheets as $index => $timesheet) {
                $timesheets[$index]->rate = $this->computeRate($user_id, $timesheet);
            }
            return view('intern.reports', compact('timesheets', 'start_date', 'end_date'));
        }
    }

    public function export(Request $request, $id = null)
    {
        $user_id = (empty($id)) ? auth()->user()->id : $id;
        $user_name = auth()->user()->name;
        $hourly_rate = auth()->user()->hourly_rate;
        $start_date = $request->input('start_date') ?? $request->route('start_date');
        $end_date = $request->input('end_date') ?? $request->route('end_date');
        
        $timesheets = Timesheet::where('user_id', $user_id)
            ->when($start_date, function ($query, $start_date) {
                return $query->whereDate('start_time', '>=', $start_date);
            })
            ->when($end_date, function ($query, $end_date) {
                return $query->whereDate('start_time', '<=', $end_date);
            })
            ->orderBy('start_time', 'desc')
            ->orderBy('end_time', 'desc')
            ->get();

        foreach ($timesheets as $index => $timesheet) {
            $timesheets[$index]->rate = $this->computeRate($user_id, $timesheet);
            //dd($timesheets[$index]->rate, gettype($timesheets[$index]->rate));
            $timesheets[$index]->hourly_rate = $hourly_rate;
        }

        $totalAllowance = 0;

        foreach ($timesheets as $timesheet) {
            //dd($timesheet->rate, gettype($timesheet->rate));
            try {
                $totalAllowance += $timesheet->rate;
            } catch (Exception $e) {
                $totalAllowance += floatval(str_replace(',', '', $timesheet->rate));
            }
        }
        
        if ($request->has('export_csv') || $request->submit == "export_csv") {
            $filename = "Timesheets_of_{$user_name}_from_{$start_date}_to_{$end_date}.csv";
            return Excel::download(new TimesheetsExport($timesheets), $filename);
        } elseif ($request->has('export_xlsx') || $request->submit == "export_xlsx") {
            $filename = "Timesheets_of_{$user_name}_from_{$start_date}_to_{$end_date}.xlsx";
            return Excel::download(new TimesheetsExport($timesheets), $filename);
        } elseif ($request->has('export_pdf') || $request->submit == "export_pdf") {
            $filename = "Timesheets_of_{$user_name}_from_{$start_date}_to_{$end_date}.pdf";
            $pdf = PDF::loadView('intern.timesheets_pdf', compact('timesheets', 'totalAllowance'));
            return $pdf->download($filename); //returns a response to a pdf
        }
    }


    public function exportSelection(Request $request) //pdf's only
    {
        try {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            if(isset($request->timesheets)){
    
                //create zip file and add pdf's one-by-one
                //NOTE: DON'T FORGET TO ENABLE extension=zip in the php.ini and create the pdf's folder
                $zip = new ZipArchive();
                $zip_filename = "timesheets_{$request->input('start_date')}_{$request->input('end_date')}.zip";

                //storage_path is used because ZipArchive is not a laravel-exclusive package
                $result_code = $zip->open(storage_path('app/storage/pdfs/' . $zip_filename), 
                ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);

                //$this->export($request, $request->timesheets[0]);
                foreach($request->timesheets as $key=>$user_id){
                    $user_name = User::find($user_id)->name;
                    $filename = "{$user_name}_from_{$start_date}_to_{$end_date}.pdf";
                    $content = $this->export($request, $user_id)->getOriginalContent();
                    Storage::put('storage/pdfs/' . $filename, $content);
                    $headers = array(
                        'Content-Type: application/pdf',
                    );
                    
                    
                    if(storage_path('app/storage/pdfs/' . $filename)){
                        $zip->addFile(storage_path('app/storage/pdfs/' . $filename), $filename);
                    }else{
                        throw new Exception("Filepath was not valid", 1);
                    }

                }

                $zip->close();
                return Storage::download('storage/pdfs/' . $zip_filename, $zip_filename);
            }else{
                throw new Exception("No timesheets were selected", 1);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function ensureExportsDeleted()
    {
        $fs = new Filesystem();
        $fs->cleanDirectory(storage_path('app/storage/pdfs'));
    }

    public function computeRate(int $user_id, Timesheet $timesheet, int $decimal_places = 2)
    {
        $array_time = (array) explode(":", $timesheet->getDurationAttribute());
        //dd($array_time);
        $hours = (int) $array_time[0];
        $minutes = (int) $array_time[1];
        $seconds = (int) $array_time[2];
    
        $total_hours = $hours + ($minutes / 60) + ($seconds / 3600);
        // dd($total_hours);
        // return number_format(User::find($user_id)->hourly_rate * $timesheet->getDurationValue(), $decimal_places);
        // return number_format(User::find($user_id)->hourly_rate * $total_hours, $decimal_places);
        return number_format(User::find($user_id)->hourly_rate * $total_hours, $decimal_places);
    }
}
