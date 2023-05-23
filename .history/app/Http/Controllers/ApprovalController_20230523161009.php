<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\User;
use Illuminate\Http\Request;

//possibly useful link for editing the user models using this model's form:
//https://stackoverflow.com/questions/66481627/laravel-get-data-of-a-specific-column-from-table-and-store-it-in-a-different-co

class ApprovalController extends Controller
{
    public function index(Request $request)
    {   
    $approvals = Approval::where('approve', '=', null)->get();
    $approvedRequests = Approval::where('approve', '=', true)->get();
    $unapprovedRequests = Approval::where('approve', '=', false)->get();

    $user_id = auth()->user()->id;
    $user = User::find($user_id);


    if(auth()->user()->role != 'superadmin') {
        $approvals = $approvals->where('field_to_edit', '<>', 'hourly_rate');
    }

    return view('admin.approvals', compact('approvals', 'approvedRequests', 'unapprovedRequests', 'user'));
    }

    public function approve_requests(Request $request)
    {
        $approvals = Approval::find(array_keys($request->input('approval', [])));
        foreach ($approvals as $approval) {
            $approval->approve = $request->input('approval.' . $approval->id);//filter_var($request->input('approval.' . $approval->id), FILTER_VALIDATE_BOOLEAN);
            $approval->save();

            if ($approval->approve) {
                // Retrieve user profile based on approval request
                $user = User::find($approval->profile_id);
    
                // Update modified field value in user profile
                $user->{$approval->field_to_edit} = $approval->modified_value;
                $user->save();
            }
        }


        return redirect('/admin/approvals');
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

        // dd($request->input('modified_fields'));

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

                $user = User::find($approvalRequest->profile_id);
                $approvalRequest->original_value = $user->{$modifiedField}; //$request->input($modifiedField)

                $approvalRequest->modified_value = $formData[$modifiedField];
                $approvalRequest->reason = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_SPECIAL_CHARS);//$request->input('reason');
                $approvalRequest->save();
                
            }
        }
        return redirect('users/profile')->with('message', 'Approval request submitted successfully.');
    }
    
}
