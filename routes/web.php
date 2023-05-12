<?php

use App\Http\Controllers\ApprovalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TimesheetController;

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

#region Users Routes
//Show Create employee Form (admin)
Route::get('/admin/create-new-employee', [UserController::class, 'create']);

//From Register form, store new user

Route::post('/admin/create-new-employee/submit', [UserController::class, 'store']);

//Show Login form
Route::get('/users/login', [UserController::class, 'login']);

//Show Forgot Password Form
Route::get('/users/forgot', [UserController::class, 'forgotPassword']);

Route::post('/users/forgot/send_mail', [UserController::class, 'sendPasswordReset']);

Route::get('/users/forgot/password_reset_mail', [UserController::class, 'showPasswordResetMail']);

//From Login form, Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
#endregion

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

#region Change password

//show change password form
Route::get('/users/change-password', [UserController::class, 'changePassword']);

//change user's password
Route::post('/users/process-change-password', [UserController::class, 'changePasswordSubmit']);
#endregion

#upload profile picture
Route::post('/users/profile/upload-profile-picture', [UserController::class, 'uploadProfilePicture']);


#region Dashboard
Route::get('/', [UserController::class, 'dashboard']);
#endregion

#region My Profile
Route::get('/users/profile', [UserController::class, 'profile']);
#endregion

#region Other Profile
//to-do
#endregion

#region Intern Timesheets
Route::get('/intern/timesheets', [TimesheetController::class, 'index']);

Route::post('/intern/timesheets/stop', [TimesheetController::class, 'stopTracking'])->name('timesheets.stop');
#endregion

#region Intern/Admin Reports Redirector and Routes
Route::get('/reports/redirect', [ReportController::class, 'index']);

Route::get('/admin/reports', [ReportController::class, 'index']);

Route::get('/intern/reports', [ReportController::class, 'index']);

Route::get('/intern/reports/filter', [ReportController::class, 'filter']);
#endregion

#region Intern Create Edit Request
Route::get('users/profile/create-edit-request', [ApprovalController::class, 'create_edit_request']);
Route::post('users/profile/create-edit-request/send', [ApprovalController::class, 'create_edit_request_send']);
#endregion

#region Approvals
Route::get('/admin/approvals', [ApprovalController::class, 'index']);
#endregion

Route::get('/admin/employeelist', [UserController::class, 'employeelist']);
