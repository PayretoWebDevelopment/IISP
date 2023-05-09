<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->user()->isAdmin()){
            $user_id = auth()->user()->id;
            $timesheets = Timesheet::where('user_id', $user_id)->get();

            return view('intern.timesheets', compact('timesheets'));
        }
    }

    public function show(Timesheet $timesheet)
    {
        //to-do
    }

    public function create(Timesheet $timesheet)
    {
        //to-do
    }

    public function store(Timesheet $timesheet)
    {
        //to-do
    }

    public function delete(Timesheet $timesheet)
    {
        //to-do
    }
}
