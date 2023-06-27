<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\TaskType;

class TimesheetController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->user()->isAdmin()) {
            $user_id = auth()->user()->id;
            $timesheets = Timesheet::where('user_id', $user_id)->get();
            $projectTypes = ProjectType::all()->sortBy('department');
            $taskTypes = TaskType::all();

            return view('intern.timesheets', compact('timesheets', 'taskTypes', 'projectTypes'));
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
            'billable' => $request->input('billable')
        ];

        $timesheet = Timesheet::create($formFields);
        $timesheet->save();
        return response()->json(['message' => 'Timesheet submitted successfully.']);
    }

    public function projectindex()
    {
        $choices = ProjectType::all();
        return view('intern.project-type', compact('choices'));
    }

    public function projectstore(Request $request)
    {
        $choice = new ProjectType();
        $choice->name = $request->input('name');
        $choice->department = $request->input('department');
        $choice->save();

        return redirect('/project-types');
    }

    public function taskindex()
    {
        $choices = TaskType::all();
        return view('intern.task-type', compact('choices'));
    }

    public function taskstore(Request $request)
    {
        $choice = new TaskType();
        $choice->name = $request->input('name');
        $choice->save();

        return redirect('/task-types');
    }
}
