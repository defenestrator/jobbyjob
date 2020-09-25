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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('address', 'AddressController');

Route::resource('application', 'ApplicationController');

Route::resource('category', 'CategoryController');

Route::resource('listing', 'ListingController');

Route::resource('position', 'PositionController');

Route::resource('resume', 'ResumeController');

Route::get('resume-setting/toggle', 'ResumeSettingController@toggle');

Route::resource('skill', 'SkillController');