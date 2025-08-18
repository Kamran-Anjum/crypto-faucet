<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// employee controller
use App\Http\Controllers\EmployeeController;

// projects controller
use App\Http\Controllers\ProjectController;

// phases controller
use App\Http\Controllers\PhaseController;

// tasks controller
use App\Http\Controllers\TaskController;

// complain controller
use App\Http\Controllers\ComplainController;

// daily report controller
use App\Http\Controllers\DailyReportController;

// leave controller
use App\Http\Controllers\LeaveController;

// meeting controller
use App\Http\Controllers\MeetingController;

// work fron home report controller
use App\Http\Controllers\WorkFromHomeReportController;

// attandance controller
use App\Http\Controllers\AttandanceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// employee login
Route::post('/employee/login', [EmployeeController::class, 'login']);

// employee edit profile
Route::post('/employee/edit_profile', [EmployeeController::class, 'editprofile']);

// employee change password
Route::post('/employee/change_password', [EmployeeController::class, 'changepassword']);

//  employeeforggot password
Route::post('/employee/forgot_password', [EmployeeController::class, 'forggotpassword']);

//  view meetings to employee
Route::get('/employee/view_meetings/{employee_id}', [MeetingController::class, 'viewmeetingtoemployee']);

//  count meetings 
Route::get('/employee/meeting_counter/{employee_id}', [MeetingController::class, 'meetingcount']);

//  view previous meetings to employee
Route::get('/employee/view_meeting_history/{employee_id}', [MeetingController::class, 'viewmeetinghistorytoemployee']);

//  view previous meetings points to employee
Route::get('/employee/view_meeting_points/{meeting_id}', [MeetingController::class, 'viewmeetingpoint']);

//  add complain by employee
Route::post('/employee/add_complain', [ComplainController::class, 'addcomplain']);

//  view complain by login employee
Route::get('/employee/view_complain/{employee_id}', [ComplainController::class, 'viewemployeecomplain']);

//  add leave by employee
Route::post('/employee/add_leave', [LeaveController::class, 'addleave']);

//  view leave by login employee
Route::get('/employee/view_leave/{employee_id}', [LeaveController::class, 'viewemployeeleave']);

//  add work from home by employee
Route::post('/employee/add_work_from_home', [WorkFromHomeReportController::class, 'addworkfromhome']);

//  view work from home by login employee
Route::get('/employee/view_work_from_home/{employee_id}', [WorkFromHomeReportController::class, 'viewemployeeworkfromhome']);

//  view assign project list dropdown to login employee
Route::get('/employee/view_assign_project_dropdown_list/{employee_id}', [ProjectController::class, 'viewemployeeprojectsdropdown']);

//  view assign projects to login employee
Route::get('/employee/view_assign_projects/{employee_id}', [ProjectController::class, 'viewemployeeprojects']);

//  view assign project detail to login employee
Route::get('/employee/view_assign_project_detail/{employee_id}/{project_id}', [ProjectController::class, 'viewemployeeprojectdetail']);

//  add work from home by employee
Route::post('/employee/add_daily_report', [DailyReportController::class, 'adddailyreport']);

//  view work from home by login employee
Route::get('/employee/view_daily_report/{employee_id}', [DailyReportController::class, 'viewemployeedailyreport']);

//  chk current date for time in for login employee
Route::post('/employee/chk_date_today', [AttandanceController::class, 'empchkdatefortimein']);

//  time in for login employee
Route::post('/employee/time_in', [AttandanceController::class, 'emptimein']);

//  time out for login employee
Route::post('/employee/time_out', [AttandanceController::class, 'emptimeout']);

//  time out request for login employee
Route::post('/employee/time_out_request', [AttandanceController::class, 'emptimeoutrequest']);

//  view attandence by login employee
Route::get('/employee/view_attandance/{employee_id}', [AttandanceController::class, 'viewattandancetoemployee']);
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
