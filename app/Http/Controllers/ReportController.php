<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Report;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use App\Exports\TimesheetsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

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
        if ($request->user()->isAdmin()) {
            $users = User::all();
            $timesheets = Timesheet::whereHas('user', function ($query) {
                $query->where('role', '=', 'intern');
            })->with('user')->get();

            // Group the timesheets by user
            $timesheetsByUser = $timesheets->groupBy('user_id');

            // For each timesheet, call the function to convert the string returned by getDurationAttribute() to hours
            foreach ($timesheetsByUser as $user => $timesheets) {
                $totalHoursRendered = $timesheets->sum(function ($timesheet) {
                    return $this->getHours($timesheet);
                });

                // Add the sum of rendered hours to the table blade file
                $timesheetsByUser[$user]['total_hours_rendered'] = $totalHoursRendered;
            }

            return view('admin.reports', compact('timesheetsByUser', 'timesheets', 'users'));
        } else {
            $user_id = auth()->user()->id;
            $timesheets = Timesheet::where('user_id', $user_id)->get();

            foreach ($timesheets as $index => $timesheet) {
                $timesheets[$index]->rate = $this->computeRate($user_id, $timesheet);
            }
            return view('intern.reports',  compact('timesheets'));
        }
    }

    //Filter by date
    public function filter(Request $request)
    {
        if ($request->user()->isAdmin()) {
            $users = User::all();

            $start_date = $request->input('start_date');

            $end_date = $request->input('end_date');

            $timesheets = Timesheet::whereHas('user', function ($query) {
                $query->where('role', '=', 'intern');    
            })->with('user')->when($start_date, function ($query, $start_date) {
                return $query->whereDate('start_time', '>=', $start_date);
            })->when($end_date, function ($query, $end_date) {
                    return $query->whereDate('start_time', '<=', $end_date);
                })->get();

            // Group the timesheets by user
            $timesheetsByUser = $timesheets->groupBy('user_id');

            // For each timesheet, call the function to convert the string returned by getDurationAttribute() to hours
            foreach ($timesheetsByUser as $user => $timesheets) {
                $totalHoursRendered = $timesheets->sum(function ($timesheet) {
                    return $this->getHours($timesheet);
                });

                // Add the sum of rendered hours to the table blade file
                $timesheetsByUser[$user]['total_hours_rendered'] = $totalHoursRendered;
            }

            return view('admin.reports', compact('timesheetsByUser', 'timesheets', 'users'));
        } else {
            $user_id = auth()->user()->id;
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            $timesheets = Timesheet::where('user_id', $user_id)
                ->when($start_date, function ($query, $start_date) {
                    return $query->whereDate('start_time', '>=', $start_date);
                })->when($end_date, function ($query, $end_date) {
                    return $query->whereDate('start_time', '<=', $end_date);
                })->get();
            return view('intern.reports', compact('timesheets', 'start_date', 'end_date'));
        }
    }

    public function export(Request $request, $id = null)
    {
        $user_id = (empty($id)) ? auth()->user()->id : $id;
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $timesheets = Timesheet::where('user_id', $user_id)
            ->when($start_date, function ($query, $start_date) {
                return $query->whereDate('start_time', '>=', $start_date);
            })
            ->when($end_date, function ($query, $end_date) {
                return $query->whereDate('start_time', '<=', $end_date);
            })
            ->get();

        //dd([$user_id, $start_date, $end_date, $timesheets, $request->submit, $request->submit == "export_pdf"]);

        foreach ($timesheets as $index => $timesheet) {
            $timesheets[$index]->rate = $this->computeRate($user_id, $timesheet);
        }

        if ($request->has('export_csv') or $request->submit == "export_csv") {
            $filename = "{$start_date}_to_{$end_date}.csv";
            return Excel::download(new TimesheetsExport($timesheets), $filename, \Maatwebsite\Excel\Excel::CSV);
        } elseif ($request->has('export_xlsx') or $request->submit == "export_xlsx") {
            $filename = "{$start_date}_to_{$end_date}.xlsx";
            return Excel::download(new TimesheetsExport($timesheets), $filename);
        } elseif ($request->has('export_pdf') or $request->submit == "export_pdf") {
            $filename = "{$start_date}_to_{$end_date}.pdf";
            $pdf = PDF::loadView('intern.timesheets_pdf', compact('timesheets'));
            return $pdf->download($filename);
        }
    }


    public function exportSelection(Request $request)
    {
        //dd($request->timesheets);

        foreach($request->timesheets as $key=>$user_id){
            //dd($request->timesheets[0], $user_id);
            $this->export($request, $user_id);
        }

        return redirect()->back()->with('message', "PDF's successfully exported.");  
    }

    public function computeRate(int $user_id, Timesheet $timesheet, int $decimal_places = 2)
    {
        return number_format(User::find($user_id)->hourly_rate * $timesheet->getDurationValue(), $decimal_places);
    }
}
