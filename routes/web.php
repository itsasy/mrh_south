<?php

use Illuminate\Support\Facades\Route;


Route::get('/','Auth\LoginController@showLoginForm')->name('mainGeneral');
Route::post('login','Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('cerrar-sesion');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Administrador']], function () {
    Route::get('/', 'ModuleController@index_admi')->name('mainAdmin');
    Route::get('tests', 'TestsController@manage')->name('manageTest');
    Route::resource('test', 'TestsController')->except(['show']);
    Route::get('tasters', 'TastersController@manage')->name('manageTaster');
    Route::resource('taster', 'TastersController')->except(['show']);
    Route::resource('preparation', 'PreparationController');
    Route::resource('results', 'ResultsController')->only(['index']);
    Route::resource('orthogonal', 'OrthogonalController')->only(['index', 'show', 'store']);
    Route::resource('duotrio', 'DuoTrioController')->only(['index', 'store']);
    Route::get('orthogonal/excel/{filename}', 'OrthogonalController@downloadExcelOrthogonal')->name('downloadExcel');
});


Route::group(['prefix' => 'taster', 'middleware' => ['auth', 'role:Jueces']], function () {
    Route::get('/', 'ModuleController@index_taster')->name('mainTaster');
    Route::resource('evaluation', 'EvaluationController');
    Route::get('/results', 'ResultsController@index')->name('results.Taster');
    Route::post('evaluation/QDA', 'EvaluationController@storeQDA')->name('registerQda');;
});

Route::group(['prefix' => 'invited', 'as' => 'invited.'], function () {
    Route::resource('/', 'EvaluationController');
    Route::post('evaluation/pc', 'EvaluationController@storePC')->name('registerPc');
});
