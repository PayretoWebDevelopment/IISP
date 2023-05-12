<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create()
    {
        return view('users.register');
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
            'password' => 'required|confirmed|min:6'
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
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

    public function sendPasswordReset(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email']
        ]);

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        //Initialize PHPMailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        //set details
        $mail->Host = 'smtp.gmail.com';  //gmail SMTP server
        $mail->Username = 'dtinternjvivas.payreto@gmail.com';   //email
        $mail->Password = 'rmsztaufafmsmxoh';   //16 character obtained from app password created
        $mail->Port = 465;                    //SMTP port
        $mail->SMTPSecure = "ssl";

        //sender information
        $mail->setFrom('dtinternjvivas.payreto@gmail.com', 'Johann Vivas');

        //receiver address and name
        $mail->addAddress($email, 'Recipient');

        $mail->isHTML(true);

        $mail->Subject = 'PHPMailer SMTP test';
        $mail->Body    = "<h4> PHPMailer the awesome Package </h4>
        <b>PHPMailer is working fine for sending mail</b>
        <p> This is a tutorial to guide you on PHPMailer integration</p>";

        dd($mail); //DEBUGGING LINE.

        // Send mail
        if (!$mail->send()) {
            echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent.';
            return redirect("/")->with('message', "Email sent successfully.");
        }

        $mail->smtpClose();
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


    //show dashboard
    public function dashboard(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $user_id = auth()->user()->id;
            if ($request->user()->isAdmin()) {
                return view('admin.dashboard', ['user' => $request->user()]);
            } else {
                $timesheets = Timesheet::where('user_id', auth()->id())
                    ->whereDate('created_at', now()->toDateString())
                    ->get();
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
    public function employeelist(Request $request)
    {
        $employees = User::where('role', 'intern')->get();

        if ($request->user()->isAdmin()) {
            return view('admin.employeelist', compact('employees'));
        }
    }
}
