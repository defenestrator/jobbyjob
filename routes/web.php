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
    $positions = \App\Models\Position::active()->orderBy('published', 'desc')->paginate();
    return view('welcome', compact('positions'));
});

Route::middleware(['auth:sanctum'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::namespace('App\Http\Controllers')->group( function() {

    Route::resource('positions', 'PositionController');

    Route::middleware(['verified', 'auth:sanctum'])->group( function() {

        Route::resource('addresses', 'AddressController');

        Route::resource('applications', 'ApplicationController');

        Route::resource('resumes', 'ResumeController');

        Route::get('resume-settings/{resume_id}/{column}', 'ResumeSettingController@toggle');

        Route::resource('skills', 'SkillController');
    });
});

