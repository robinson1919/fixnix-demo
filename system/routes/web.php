<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/api/compliance', 'ComplianceController@importFile');
Route::post('/api/compliance', 'ComplianceController@importExcel');
Route::get('/api/compliance/loadExcel', 'ComplianceController@loadExcel');
Route::post('/api/compliance/saveExcel', 'ComplianceController@saveExcel');