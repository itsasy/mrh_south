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



Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'ModuleController@index');
    Route::get('tests', 'TestsController@manage')->name('manageTest');
    Route::resource('test', 'TestsController')->except(['show']);

    Route::get('tasters', 'TastersController@manage')->name('manageTaster');
    Route::resource('taster', 'TastersController')->except(['show']);

    Route::resource('preparation', 'PreparationController')->only(['index']);
    Route::resource('results', 'ResultsController')->only(['index']);

});


Route::group(['prefix' => 'taster'], function () {
    Route::get('/', 'ModuleController@index');
    Route::resource('evaluation', 'EvaluationController');
    Route::get('/results', 'ResultsController@index')->name('results.Taster');
});
