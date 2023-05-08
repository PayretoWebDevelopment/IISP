<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    //Create a user
    public function store(Request $request){
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
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/')->with('message', 'User logged out');
    }

    //show login form
    public function login(){
        return view('users.login');
    }

    //autheticate user
    public function authenticate(Request $request){
        //Filter functions (may not be necessary)
        $request['username'] = filter_var($request['username'], FILTER_SANITIZE_EMAIL);
        $request['password'] = filter_var($request['password'], FILTER_SANITIZE_SPECIAL_CHARS);

        $formFields = $request->validate([
            'username' => ['required', 'username'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'User logged in');
        }

        return back()->withErrors(['username' => 'Invalid credentials'])->onlyInput('username');
    }

    public function profile(Request $request)
    {
        if($request->user()){if(in_array($request->user()->role, ['superadmin', 'admin'])){
                return view('admin.profile', ['user'=>$request->user()]);
            }
            else{
                return view('intern.profile', ['user'=>$request->user()]);
            }
        }
        return redirect('/users/login');
    }

    public function dashboard (Request $request)
    {
        if($request->user()){
            return view('shared.dashboard', ['user'=>$request->user()]);
        }

        return redirect('/users/login');
    }

    public function employeelist(Request $request)
    {
        if(in_array(auth()->user()->role, ['admin', 'superadmin'])){
            return view('admin.employeelist');
        }
    }
}
