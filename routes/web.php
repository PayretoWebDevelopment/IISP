<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

#region Default Laravel routes
Route::get('/welcome', function () {
    return view('welcome');
});
#endregion

#region Users Routes
//Show Register Form
Route::get('/users/create', [UserController::class, 'create']);

//From Register form, store new user

Route::post('/users', [UserController::class, 'store']);

//Show Login form
Route::get('/users/login', [UserController::class, 'login']);

//From Login form, Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
#endregion

#region Dashboard
Route::get('/', function (Request $request)
{
    if($request->user()){
        return view('dashboard', ['user'=>$request->user()]);
    }

    return redirect('/users/login');
});
#endregion

