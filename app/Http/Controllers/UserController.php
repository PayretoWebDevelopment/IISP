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
        $request['email'] = filter_var($request['email'], FILTER_SANITIZE_EMAIL);
        $request['password'] = filter_var($request['password'], FILTER_SANITIZE_SPECIAL_CHARS);

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
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
        $request['email'] = filter_var($request['email'], FILTER_SANITIZE_EMAIL);
        $request['password'] = filter_var($request['password'], FILTER_SANITIZE_SPECIAL_CHARS);

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'User logged in');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}
