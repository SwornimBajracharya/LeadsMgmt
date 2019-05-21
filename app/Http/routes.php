<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Default route
Route::get('/', function () {
  // \Artisan::call('vendor:publish');
  return redirect('/login');
});
//Authentication routes
Route::get('login', 'Auth\AuthController@getLogin'); //get login
Route::post('login', 'Auth\AuthController@postLogin'); //post login
Route::get('logout', 'Auth\AuthController@getLogout'); //get logout

Route::group(['middleware' => 'auth'], function () {
  //DashboardController routes
  Route::controller('dashboard', 'Dashboard\DashboardController', [
    'getIndex' => 'dashboard.getIndex'
  ]);
  //CounselorController routes
  Route::controller('counselor', 'Counselor\CounselorController', [
    'getIndex'      =>  'counselor.getIndex',
    'getNew'        =>  'counselor.getNew',
    'getDelete'  =>  'counselor.getDelete',
    'getEdit'  =>  'counselor.getEdit',
    'postEdit'  =>  'counselor.postEdit'
  ]);
  //LeadController routes
  Route::controller('lead', 'Lead\LeadController', [
    'getIndex' => 'lead.getIndex',
    'getNew' => 'lead.getNew',
    'getEdit' => 'lead.getEdit',
    'postEdit' => 'lead.postEdit',
    'getFollowUp' => 'lead.getFollowUp',
    'postFollowUp' => 'lead.postFollowUp',
    'getStudents' => 'lead.getStudents',
    'getCovertToStudent' => 'lead.getCovertToStudent',
    'getFollowups' => 'lead.getFollowups',
  ]);
  //FollowupController routes
  Route::controller('followup', 'Followup\FollowupController', [
    'getIndex' => 'followup.getIndex'
  ]);
  //ReportController routes
  Route::controller('report', 'Report\ReportController', [
    'getIndex' => 'report.getIndex',
    'getCounselorReport' => 'report.getCounselorReport',
    'getActiveLeadsReport' => 'report.getActiveLeadsReport',
    'getStatusReport' => 'report.getStatusReport',
  ]);
});

