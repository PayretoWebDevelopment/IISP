<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.approvals');
    }

    public function show()
    {
        //to-do
    }

    public function create()
    {
        //to-do
    }

    public function store()
    {
        //to-do
    }

    public function delete()
    {
        //to-do
    }

    //create edit request (interns  )
    public function create_edit_request(Request $request)
    {

        return view('intern.create-edit-request', ['user' => $request->user()]);
    }
}
