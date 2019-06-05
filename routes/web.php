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

Route::get('/','JobsController@index');
Route::get('/jobs/create', 'JobsController@create')->name('job.create');
Route::post('/jobs/store', 'JobsController@store')->name('job.store');
Route::get('/jobs/{id}/edit', 'JobsController@edit')->name('job.edit');
Route::post('/jobs/{id}/edit', 'JobsController@update')->name('job.update');
Route::get('/jobs/my-job', 'JobsController@myJob')->name('job.myjob');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs/{id}/{job}', 'JobsController@show')->name('jobs.show');
Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('/company/create', 'CompanyController@create')->name('company.create');
Route::post('/company/store', 'CompanyController@store')->name('company.store');
Route::post('company/logo', 'CompanyController@companylogo')->name('company.logo');
Route::post('company/coverphoto', 'CompanyController@coverphoto')->name('cover.photo');


Route::get('user/profile', 'UserProfileController@index')->name('profile.create');
Route::post('user/profile/store', 'UserProfileController@store')->name('profile.store');
Route::post('user/coverletter', 'UserProfileController@coverletter')->name('cover.letter');
Route::post('user/resume', 'UserProfileController@resume')->name('resume');
Route::post('user/avatar', 'UserProfileController@avatar')->name('avatar');


Route::view('employer/register','auth.employer_register')->name('employer.register');
Route::post('employer/register', 'EmployerController@register')->name('emp.register');
