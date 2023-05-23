<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;
use PDF;

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

    public function stopTracking(Request $request)
    {
        $start_time = date('Y-m-d H:i:s', strtotime($request->input('start_time')));
        $end_time = date('Y-m-d H:i:s', strtotime($request->input('end_time')));
        $user_id = auth()->id();

        $formFields = [
            'user_id' => $user_id,
            'task_name' => filter_input(INPUT_POST, 'task_name', FILTER_SANITIZE_SPECIAL_CHARS), //$request->input('task_name'),
            'task_type' => filter_input(INPUT_POST, 'task_type', FILTER_SANITIZE_SPECIAL_CHARS), //$request->input('task_type'),
            'project_type' => filter_input(INPUT_POST, 'project_type', FILTER_SANITIZE_SPECIAL_CHARS), //$request->input('project_type'),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $timesheet = Timesheet::create($formFields);
        $timesheet->save();
        return response()->json(['message' => 'Timesheet submitted successfully.']);
    }

    public function show(Timesheet $timesheet)
    {
        //to-do
    }

    public function create(Timesheet $timesheet)
    {
        //to-do
    }

    public function store(Request $request)
    {
        //to-do
    }

    public function delete(Timesheet $timesheet)
    {
        //to-do
    }
}
