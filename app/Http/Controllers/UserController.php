<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Approval;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use Illuminate\Validation\Rule;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Show Create Form (admin)
    public function create()
    {
        return view('admin.create-new-employee');
    }

    //Create a user
    public function store(Request $request)
    {
        //filter functions (may not be necessary)
        $request['name'] = filter_var($request['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $request['username'] = filter_var($request['username'], FILTER_SANITIZE_SPECIAL_CHARS);
        $request['email'] = filter_var($request['email'], FILTER_SANITIZE_EMAIL);
        $request['password'] = filter_var($request['password'], FILTER_SANITIZE_SPECIAL_CHARS);

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', 'username', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'role' => ['required'],
            'contact_number' => ['required', 'numeric'],
            'position' => ['required'],
            'department' => ['required'],
            'start_date' => ['nullable', 'date'],
            'active' => ['nullable', 'boolean'],
            'hourly_rate' => ['nullable', 'numeric'],
            'required_hours' => ['nullable', 'numeric'],
            'bank' => ['nullable'],
            'hourly_rate_last_updated' => ['nullable', 'date', 'default' => now()],
            'supervisor' => ['nullable'],
            'bank_account_no' => ['nullable'],
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        return redirect('/admin/employee-list')->with('message', 'Employee successfully created');
    }

    //Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/')->with('message', 'User logged out');
    }

    //show login form
    public function login()
    {
        return view('users.login');
    }

    //autheticate user
    public function authenticate(Request $request)
    {
        //Filter functions (may not be necessary)
        $request['username'] = filter_var($request['username'], FILTER_SANITIZE_EMAIL);
        $request['password'] = filter_var($request['password'], FILTER_SANITIZE_SPECIAL_CHARS);

        $formFields = $request->validate([
            'username' => ['required', 'username'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'User logged in');
        }

        return back()->withErrors(['username' => 'Invalid credentials'])->onlyInput('username');
    }

    //show forgot password form
    public function forgotPassword(Request $request)
    {
        return view('users.forgot_password');
    }

    public function sendResetMail($to_mail, $to_name, $is_copy = false, $from = 'dtinternjvivas.payreto@gmail.com', $password = 'rmsztaufafmsmxoh')
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('m/d/Y h:i:s a', time());
        
        //Initialize PHPMailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        //set details
        $mail->Host = 'smtp.gmail.com';  //gmail SMTP server
        $mail->Username = $from;   //email
        $mail->Password = $password;   //16 character obtained from app password created
        $mail->Port = 465;                    //SMTP port
        $mail->SMTPSecure = "ssl";

        //sender information
        $mail->setFrom($from, 'Payreto Intern Information System and Payroll Application');

        //receiver address and name
        $resolved_addr = ($is_copy) ? $from : $to_mail;
        $mail->addAddress($resolved_addr, '');

        $mail->isHTML(true);

        $mail->Subject = 'Payreto IISP Password Reset';
        $mail->Body    = view('users.forgot_password_email', compact('to_mail', 'to_name', 'date', 'is_copy'))->render();

        //dd($mail); //DEBUGGING LINE.

        // Send mail
        if (!$mail->send()) {
            echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
            return $mail->ErrorInfo;
        } else {
            return "true";
        }
        
        $mail->smtpClose();
    }

    public function sendPasswordResetMails(Request $request)
    {

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required'],
        ]);

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        $feedback = $this->sendResetMail(to_mail : $email, to_name : $name, is_copy : false);
        $feedback = $this->sendResetMail(to_mail : $email, to_name : $name, is_copy : true);

        // Send mail
        if ($feedback != "true") {
            echo 'Email not sent an error was encountered: ' . $feedback;
        } else {
            return redirect("/")->with('message', "Email sent successfully.");
        }
        

    }

    public function showPasswordResetMail(Request $request)
    {
        return view('users.forgot_password_email');
    }

    // show change password form
    public function changePassword()
    {
        return view('users.change_password');
    }

    //change user's password
    public function changePasswordSubmit(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $credentials = [
            'email' => $user->email,
            'password' => $request->input('current_password')
        ];

        if (Auth::attempt($credentials)) {
            $user->update([
                'password' => Hash::make($request->input('password'))
            ]);

            Auth::logout();

            return redirect('/users/login')->with('success', 'Your password has been changed successfully. Please log in again.');
        }

        return redirect()->back()->withErrors(['current_password' => 'Your current password is incorrect.']);
    }

    //show profile
    public function profile(Request $request)
    {
        if ($request->user()->isAdmin()) {
            return view('admin.profile', ['user' => $request->user()]);
        } else {
            return view('intern.profile', ['user' => $request->user()]);
        }
        return redirect('/users/login');
    }

    //show profile
    public function other_profile(Request $request, int $id)
    {
        if ($request->user()->isAdmin()) {
            $other_user = User::find($id);
            //$view = $other_user->isAdmin()? 'admin.otherprofile';
            return view('admin.otherprofile', ['user' => $other_user]);
        } else {
            return redirect('/users/login');
        }
        return redirect('/users/login');
    }

    //show dashboard
    public function dashboard(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $user_id = auth()->user()->id;
            if ($request->user()->isAdmin()) {
                
                $attendance = $this->attendancetracker($request);
                return view('admin.dashboard', [
                    'user' => $request->user(), 'timedInPercentage' => $attendance['timedInPercentage'],
                    'notTimedInPercentage' => $attendance['notTimedInPercentage']
                ]);
            } else {
                $timesheets = Timesheet::whereBetween('start_time', [now()->startOfDay(), now()->endOfDay()])
                    ->where('user_id', auth()->id())
                    ->get();

                // dd($timesheets);

                $attendance = $this->attendancetracker($request);
                return view('intern.dashboard', [
                    'user' => $request->user(), 'timesheets' => $timesheets, 'timedInPercentage' => $attendance['timedInPercentage'],
                    'notTimedInPercentage' => $attendance['notTimedInPercentage']
                ]);
            }
        }
        return redirect('/users/login');
    }

    //attendance tracker
    public function attendancetracker(Request $request)
    {
        $interns = User::where('role', 'intern')->get();
        // Get the current date and time
        $currentDate = now()->toDateString();

        // Count the number of interns who have timed in and who have not timed in
        $timedInCount = 0;
        $notTimedInCount = 0;

        foreach ($interns as $intern) {
            $timesheet = $intern->timesheets()->whereDate('created_at', $currentDate)->first();
            if ($timesheet) {
                $timedInCount++;
            } else {
                $notTimedInCount++;
            }
        }

        // Calculate the percentage of interns who have timed in and who have not timed in
        $totalInterns = count($interns);
        $timedInPercentage = ($timedInCount / $totalInterns) * 100;
        $notTimedInPercentage = ($notTimedInCount / $totalInterns) * 100;

        return ['timedInPercentage' => $timedInPercentage, 'notTimedInPercentage' => $notTimedInPercentage];
    }

    //upload profile picture
    public function uploadProfilePicture(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        // dd($user);
        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            // Validate the uploaded file
            $validatedData = $request->validate([
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Store the uploaded file
            $filename = $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_pictures', $filename);

            // Update the user's profile picture
            $user->profile_picture = $filename;
            $user->save();
            // dd($user->profile_picture);
            return back()->with('success', 'Profile picture uploaded successfully.');
        }

        return back()->with('success', 'No file uploaded.');
    }


    //show employee list
    public function employee_list(Request $request)
    {
        $interns = User::where('role', 'intern')->get();
        $admins = User::where('role', 'admin')->get();
        $user_role = $request->user()->role;
        if ($request->user()->isAdmin()) {
            return view('admin.employee-list', compact('interns', 'admins', 'user_role'));
        }
    }

    //show edit employee form
    public function employee_edit($id, Request $request)
    {
        $employee = User::findOrFail($id);
        $role = $request->user()->role;
        return view('admin.employee-edit', compact('employee', 'role'));
    }

    //request edit hourly rate
    public function employee_request_edit($id, Request $request)
    {
        $employee = User::findOrFail($id);
        $employees = User::where('role', 'intern')->get();

    $approvalRequest = new Approval();
                $approvalRequest->requestor_id = $request->user()->id;
                $approvalRequest->profile_id = $employee->id;
                $approvalRequest->field_to_edit = 'hourly_rate';
                $approvalRequest->original_value = $employee->hourly_rate; 
                $approvalRequest->modified_value = $request->input('hourly_rate');
                $approvalRequest->reason = $request->input('reason');
                // dd($approvalRequest);
                $approvalRequest->save();

    return view('admin.employee-list', compact('employees'));
    }

    //Edit Employee
    public function employee_update(Request $request, $id)
    {
        $employee = User::findOrFail($id);
        // dd($request->all());
        // Validate the form data
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'username' => 'required|max:50',
        //     'email' => 'required',
        //     'contact number' => 'required|numeric',
        //     'position' => 'required|max:255',
        //     'role' => 'required|max:255',
        //     'hourly_rate' => 'required|numeric',
        //     'required_hours' => 'required|numeric',
        //     'department' => 'required|max:255',
        //     'start_date' => 'required|date',
        //     'active' => 'required|boolean',
        //     'bank' => 'required|max:255',
        //     'bank account number' => 'required|numeric',
        // ]);

        // dd($request->all());
        // // Update the employee record with the new data
        // $employee->save($validatedData);
        $employee->name = $request->name;
        $employee->username = $request->username;
        $employee->email = $request->email;
        $employee->contact_number = $request->contact_number;
        $employee->position = $request->position;
        $employee->hourly_rate = $request->hourly_rate;
        $employee->required_hours = $request->required_hours;
        $employee->department = $request->department;
        $employee->start_date = $request->start_date;
        $employee->active = $request->active;
        $employee->bank = $request->bank;
        $employee->bank_account_no = $request->bank_account_number;

        $employee->save();

        // Redirect back to the employee list
        return redirect('/admin/employee-list')->with('success', 'Employee updated successfully!');
    }

    // Delete emplotee
    public function employee_delete($id)
    {
        // Find the employee by ID and delete it
        $employee = User::findOrFail($id);
        $employee->delete();

        // Redirect back to the employee list page with a success message
        return redirect('/admin/employee-list')->with('success', 'Employee deleted successfully');
    }
}
