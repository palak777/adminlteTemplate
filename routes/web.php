<?php

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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('employee_display', 'EmployeeController@list');
    Route::get('employee_list', 'EmployeeController@index')->name('employeeList');
  	Route::post('employee_add', 'EmployeeController@create')->name('employeeAdd'); 
  	Route::get('employee_update/{id}', 'EmployeeController@update_view')->name('employeeUpdateView');
  	Route::post('employee_update_row/{id}', 'EmployeeController@update')->name('employeeUpdate'); 
  	Route::get('employee_delete/{id}', 'EmployeeController@delete')->name('employeeDelete'); 
});
