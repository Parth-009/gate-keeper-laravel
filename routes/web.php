<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddvisitorController;
use App\Http\Controllers\StafflistController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\MemberlistController;
use App\Http\Controllers\StaffAttendenceController;
use App\Http\Controllers\ComplaintController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('addvisitor','auth.addvisitor');
Route::view('stafflist','auth.stafflist');
Route::post('/add-visitor',[AddvisitorController::class,'create']);
Route::get('/show-visitor',[AddvisitorController::class,'show']);
Route::post('/staff-list',[StafflistController::class,'stafflist']);
Route::get('/staff-list',function(){
    return view('auth.stafflist');
});
Route::get('/add-staff',function(){
    return view('auth.addstaff');
});
Route::post('/add-staff',[StafflistController::class,'addstaff']);
Route::get('/delete-staff',function(){
    return view('auth.deletestaff');
});
Route::post('/delete-staff',[StafflistController::class,'deletestaff']);
Route::get('/delete-member/{id}',[StafflistController::class,'deletemember']);
Route::post('/edit-staff',[StafflistController::class,'editstaff']);
Route::post('/edit-detail',[StafflistController::class,'editdetail']);
Route::get('/edit-staff/{id}',[StafflistController::class,'editmember']);
Route::get('/edit-staff',function(){
    return view('auth.editstaff');
});
Route::get('/member',function(){
    return view('auth.memberdictionary');
});
Route::get('/member-add',function(){
    return view('auth.memberadd');
});
Route::post('/member-add',[MemberlistController::class,'addmember']);
Route::get('/member-delete',function(){
    return view('auth.memberdelete');
});
Route::post('/member-delete',[MemberlistController::class,'deletemember']);
Route::get('/member-delete/{id}',[MemberlistController::class,'delete']);

Route::get('/a-wing-Member',[MemberlistController::class,'wing_a_member']);
Route::get('/b-wing-Member',[MemberlistController::class,'wing_b_member']);
Route::get('/c-wing-Member',[MemberlistController::class,'wing_c_member']);
Route::get('/d-wing-Member',[MemberlistController::class,'wing_d_member']);


//staff-attendence route
Route::get('/staff-attendence',function(){
    return view('auth.staffattendence');
});
Route::get('/attendenceList',function(){
    return view('auth.attendencelist');
});
Route::post('/staff-present',[StaffAttendenceController::class,'present']);

Route::get('/staff-attendence',[StaffAttendenceController::class,'table']);
Route::get('/attendence/list',[StaffAttendenceController::class,'attendencelist']);

//Complaint route
Route::get('/adminComplaintbox',[ComplaintController::class,'admincomplaintpanel']);
Route::get('/updatestatus/{id}',[ComplaintController::class,'updatestatus']);
Route::get('/deletestatus/{id}',[ComplaintController::class,'deletestatus']);
Route::get('/complaintstatus',function(){
    return view('auth.Complaintstatus');
});
Route::get('/complaintstatus',[ComplaintController::class,'totalcomplaint']);
//Route::get('/complaintstatus',[ComplaintController::class,'newcomplaint']);


//User Route
Route::get('/addComplaint',function(){
    return view('User.AddComplaint');
});
Route::get('/UserComplaint',function(){
    return view('User.Complaintbox');
});
Route::post('/UseraddComplaint',[ComplaintController::class,'useraddcomplaint']);
Route::get('/UserComplaintbox',[ComplaintController::class,'usercomplaintpanel']);

//demo controller
Route::get('demo',[DemoController::class,'demo']);
Route::get('/index',function(){
    return view('demo');
});