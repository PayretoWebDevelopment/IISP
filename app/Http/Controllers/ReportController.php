<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Exception;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->isAdmin()){
            return redirect('/admin/reports');
        }else{
            return redirect('/intern/reports');
        }
    }

    public function admin_index(Request $request)
    {
        try {
            if(!$request->user()->isAdmin()){throw new Exception('User is not an Admin.');}
            return view('admin.reports');
        } catch (\Throwable $th) {
            return 'Caught exception: '.  $th->getMessage() .  "\n";
        }
    }

    public function intern_index(Request $request)
    {
        try {
            if($request->user()->isAdmin()){throw new Exception('User is not an Intern.');}
            return view('intern.reports');
        } catch (\Throwable $th) {
            return 'Caught exception: '.  $th->getMessage() .  "\n";
        }
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
