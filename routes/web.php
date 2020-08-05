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
    // return view('welcome');
    return redirect('/auth/login');
});

Route::get('/biodata','BiodataController@index');
Route::get('/biodata/create','BiodataController@create');
Route::post('/biodata/store','BiodataController@store');
Route::get('/biodata/edit/{id}','BiodataController@edit');
Route::post('/biodata/update/{id}','BiodataController@update');
Route::get('/biodata/destroy/{id}','BiodataController@destroy');

Route::get('/pendidikan','SchoolController@index');
Route::get('/pendidikan/create','SchoolController@create');
Route::post('/pendidikan/store','SchoolController@store');
Route::get('/pendidikan/edit/{id}','SchoolController@edit');
Route::post('/pendidikan/update/{id}','SchoolController@update');
Route::get('/pendidikan/destroy/{id}','SchoolController@destroy');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/auth/login', 'Auth\LoginController@login');
Route::post('/auth/login', 'Auth\LoginController@authentication');
Route::post('/auth/logout', 'Auth\LoginController@logout');

Route::get('/skill','SkillController@index');
Route::get('/skill/create','SkillController@create');
Route::post('/skill/store','SkillController@store');
Route::get('/skill/edit/{id}','SkillController@edit');
Route::post('/skill/update/{id}','SkillController@update');
Route::get('/skill/destroy/{id}','SkillController@destroy');

Route::get('/pengalaman','ExperienceController@index');
Route::get('/pengalaman/create','ExperienceController@create');
Route::post('/pengalaman/store','ExperienceController@store');
Route::get('/pengalaman/edit/{id}','ExperienceController@edit');
Route::post('/pengalaman/update/{id}','ExperienceController@update');
Route::get('/pengalaman/destroy/{id}','ExperienceController@destroy');

Route::get('/resume','CurriculumVitaeController@index');
Route::get('/resume/create','CurriculumVitaeController@create');
Route::get('/resume/school','CurriculumVitaeController@school');
Route::get('/resume/skill','CurriculumVitaeController@skill');
Route::get('/resume/experience','CurriculumVitaeController@experience');

Route::get('/convert','CurriculumVitaeController@convert');
Route::post('/convert/store','CurriculumVitaeController@storeConvert');

// Route::get('/transform', 'TransformController@getDistance');
// Route::post('/transform/predict', 'TransformController@getPredict');
Route::get('/transform/create','TransformController@create');
Route::match(array('GET','POST'),'/transform', 'TransformController@index');
Route::get('/transform/show/{id}','TransformController@show');

Route::namespace("Admin")->prefix('admin')->group(function(){
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/jobseeker', 'JobseekerController@index');
    Route::post('/jobseeker/import_excel', 'JobseekerController@import_excel')->name('jobseeker.import');
    Route::namespace('Auth')->group(function(){
        Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('admin.logout');
    });
    
});

