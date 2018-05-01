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
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
//Route::get('system-management/{option}', 'EmployeeController@index');
Route::get('/profile', 'ProfileController@index');

Route::resource('user-management/user', 'UserController');
Route::post('user-management/user/search', 'UserController@search')->name('user.search');

Route::resource('user-management/role', 'RoleController');
Route::post('user-management/role/search', 'RoleController@search')->name('role.search');

/*Route::resource('user-management/employee', 'EmployeeController');
Route::post('user-management/employee/search', 'EmployeeController@search')->name('employee.search');
Route::get('avatars/{name}', 'EmployeeController@load');*/

Route::resource('employee-management', 'EmployeeManagementController');
Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');
Route::get('avatars/{name}', 'EmployeeManagementController@load');

Route::resource('system-management/department', 'DepartmentController');
Route::post('system-management/department/search', 'DepartmentController@search')->name('department.search');

Route::resource('system-management/division', 'DivisionController');
Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

Route::resource('system-management/country', 'CountryController');
Route::post('system-management/country/search', 'CountryController@search')->name('country.search');

Route::resource('system-management/client', 'ClientController');
Route::post('system-management/client/search', 'ClientController@search')->name('client.search');

Route::resource('system-management/state', 'StateController');
Route::post('system-management/state/search', 'StateController@search')->name('state.search');

Route::resource('system-management/city', 'CityController');
Route::post('system-management/city/search', 'CityController@search')->name('city.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');

Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');