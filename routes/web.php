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
Route::get('job/sort', 'JobController@sort');
Route::get('job/filter', 'JobController@filter');


Route::get('company/my', 'CompanyController@my');
Route::get('resume/my', 'ResumeController@my');
Route::get('job/my', 'JobController@my');



Route::resource('company', 'CompanyController');
Route::resource('job', 'JobController');
Route::resource('resume', 'ResumeController');


//Route::group(['middleware' => 'auth'], function()
//{
//    Route::resource('resume', 'ResumeController', ['except' => ['create','edit','my'] ]);
//});




Route::post('resume/preview', 'ResumeController@preview');



Route::get('/', array('uses' => 'SearchController@search'));
Route::get('autocomplete', array('as' => 'autocomplete', 'uses' => 'SearchController@autocomplete'));
Route::get('autocompletec', array('as' => 'autocompletec', 'uses' => 'SearchController@autocompletec'));
Route::get('cats', 'SearchController@cats');



Route::get('terms', function () {
    return view('terms');
});


Auth::routes();

Route::get('/home', 'HomeController@index');



