<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

//possibly useful link for editing the user models using this model's form:
//https://stackoverflow.com/questions/66481627/laravel-get-data-of-a-specific-column-from-table-and-store-it-in-a-different-co

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

    //show edit request (interns  )
    public function create_edit_request(Request $request)
    {

        return view('intern.create-edit-request', ['user' => $request->user()]);
    }

    //create edit request (interns)
    public function create_edit_request_send(Request $request)
    {
        // retrieve form data
        $formData = $request->only([
            'name',
            'email',
            'contact_number',
            'position',
            'start_date',
            'active',
            'hourly_rate',
            'required_hours',
            'bank',
            'supervisor',
            'bank_account_no',
            'department',
        ]);
    
        $modifiedFields = explode(',', str_replace(['[', ']', '"'], '', $request->input('modified_fields')));

        
        foreach ($modifiedFields as $modifiedField) {
            if (array_key_exists($modifiedField, $formData)) {
                $formData[$modifiedField] = $request->input($modifiedField);
            }
        }

        foreach ($modifiedFields as $modifiedField) {
            if (array_key_exists($modifiedField, $formData)) {
                // create approval request for modified field
                $approvalRequest = new Approval();
                $approvalRequest->requestor_id = $request->user()->id;
                $approvalRequest->profile_id = $request->user()->id;
                $approvalRequest->field_to_edit = $modifiedField;
                $approvalRequest->original_value = $request->input($modifiedField);
                $approvalRequest->modified_value = $formData[$modifiedField];
                $approvalRequest->reason = $request->input('reason');
                $approvalRequest->save();
                
            }
        }
        return redirect('users/profile')->with('message', 'Approval request submitted successfully.');
    }
    
}
