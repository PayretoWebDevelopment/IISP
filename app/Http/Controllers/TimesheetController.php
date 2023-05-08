<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'intern'){
            return view('intern.timesheets');
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
