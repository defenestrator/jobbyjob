<?php

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
    $positions = \App\Models\Position::paginate();
    return view('welcome', compact('positions'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['verified', 'auth:sanctum'])->namespace('App\Http\Controllers')->group( function() {

    Route::resource('addresses', 'AddressController');

    Route::resource('applications', 'ApplicationController');

    Route::resource('positions', 'PositionController');

    Route::resource('resumes', 'ResumeController');

    Route::get('resume-settings/{resume_id}/{column}', 'ResumeSettingController@toggle');

    Route::resource('skills', 'SkillController');
});

