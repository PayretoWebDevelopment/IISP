<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        if (in_array(auth()->user()->role, ['admin', 'superadmin'])){
            return redirect('/admin/reports');
        }else{
            return redirect('/intern/reports');
        }
    }

    public function admin_index(Request $request)
    {
        return view('admin.reports');
    }

    public function intern_index(Request $request)
    {
        return view('intern.reports');
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
