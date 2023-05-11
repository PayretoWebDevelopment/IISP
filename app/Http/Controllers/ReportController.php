<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Report;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->isAdmin()){
            return redirect('/admin/reports');
        }else{
            $user_id = auth()->user()->id;
            $timesheets = Timesheet::where('user_id', $user_id)->get();

            return view('intern.reports',  compact('timesheets'));
        }
    }

    //Filter by date
    public function filter(Request $request)
    {
        $user_id = auth()->user()->id;
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $timesheets = Timesheet::where('user_id', $user_id)
                                ->when($start_date, function ($query, $start_date) {
                                    return $query->whereDate('created_at', '>=', $start_date);
                                })
                                ->when($end_date, function ($query, $end_date) {
                                    return $query->whereDate('created_at', '<=', $end_date);
                                })
                                ->get();

        return view('intern.reports', compact('timesheets', 'start_date', 'end_date'));
    }

    public function show(Report $report)
    {
        //to-do
    }

    public function create(Report $report)
    {
        //to-do
    }

    public function store(Report $report)
    {
        //to-do
    }

    public function delete(Report $report)
    {
        //to-do
    }
}
