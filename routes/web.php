<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LoginController@index')->name('mainGeneral');;
Route::post('login', 'LoginController@login')->name('logeo');
Route::get('logout', 'LoginController@logout')->name('cerrar-sesion');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'ModuleController@index')->name('mainAdmin');
    Route::get('tests', 'TestsController@manage')->name('manageTest');
    Route::resource('test', 'TestsController')->except(['show']);
    Route::get('tasters', 'TastersController@manage')->name('manageTaster');
    Route::resource('taster', 'TastersController')->except(['show']);
    Route::resource('preparation', 'PreparationController');
    Route::resource('results', 'ResultsController')->only(['index']);
    Route::resource('orthogonal', 'OrthogonalController');
    Route::resource('duotrio', 'DuoTrioController');

    Route::get('orthogonal/excel/{filename}', 'OrthogonalController@downloadExcelOrthogonal')->name('downloadExcel');

    

});


Route::group(['prefix' => 'taster'], function () {
    Route::get('/', 'ModuleController@index')->name('mainTaster');
    Route::resource('evaluation', 'EvaluationController');
    Route::get('/results', 'ResultsController@index')->name('results.Taster');
});
