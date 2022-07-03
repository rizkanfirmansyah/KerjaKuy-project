<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/home','HomeController@index');
Route::get('/Job_detail/{job}','App\Http\Controllers\JobController@ShowJobDetail');
Route::post('/Job_detail/{job}','App\Http\Controllers\JobController@ApplyJob');

Route::get('/Logout','App\Http\Controllers\UserController@Logout');

Route::get('/jobs','App\Http\Controllers\JobController@jobs_list');

Route::get('/notifications','App\Http\Controllers\HomeController@notification');

Route::get('/notification_detail/{notification}','App\Http\Controllers\HomeController@notification_detail');
Route::post('/notification_detail/{apply}','App\Http\Controllers\HomeController@message');
Route::delete('/notification_detail/{apply}','App\Http\Controllers\HomeController@reject');
Route::POST('/notification_detail/accept/job','App\Http\Controllers\HomeController@accept');
Route::POST('/notification_detail/accept/interviews','App\Http\Controllers\HomeController@accepts');
Route::POST('/notification_detail/accept/request','App\Http\Controllers\HomeController@request');
Route::POST('/message/accept/{id}','App\Http\Controllers\HomeController@message_accept');
Route::POST('/accept_interview','App\Http\Controllers\JobController@accept_interview');
Route::POST('/accept','App\Http\Controllers\JobController@accepted');

Route::delete('/cancel/{apply}','App\Http\Controllers\JobController@cancel');
Route::delete('/cancel_request/{apply}','App\Http\Controllers\JobController@cancel_request');

Route::get('/profile','App\Http\Controllers\UserController@profile');
Route::post('/profile','App\Http\Controllers\UserController@store');

Route::get('/completeprofile','App\Http\Controllers\UserController@profile_after_login');

Route::get('/Update_profile/{id}','App\Http\Controllers\UserController@Update_profile');
Route::patch('/update/profile/{id}','App\Http\Controllers\UserController@Update');

Route::get('/add','App\Http\Controllers\JobController@index');
Route::post('/Addjob','App\Http\Controllers\JobController@store');

Route::get('/jobs/delete/{id}','App\Http\Controllers\JobController@destroy');
Route::get('/Update_job/{Job}','App\Http\Controllers\JobController@showUpdate');
Route::post('/update/job/{Job}','App\Http\Controllers\JobController@update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
