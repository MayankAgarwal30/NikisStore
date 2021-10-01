<?php

use Illuminate\Support\Facades\Route;

//Install for Demo
Route::get('/verified-code', 'InstallController@verifiedCode');
Route::post('/verified-code', 'InstallController@verifiedCodeStore');


Route::get('install', 'InstallController@index');
Route::get('check-purchase-verification', 'InstallController@CheckPurchaseVerificationPage');
Route::post('check-verified-input', 'InstallController@CheckVerifiedInput');
Route::get('check-environment', 'InstallController@checkEnvironmentPage');
Route::any('checking-environment', 'InstallController@checkEnvironment');
Route::get('system-setup-page', 'InstallController@systemSetupPage');
Route::post('confirm-installing', 'InstallController@confirmInstalling');
Route::get('confirmation', 'InstallController@confirmation');




Route::get('/install2', 'InstallController@installPage2'); // if verified, then success message & database credentials page
Route::get('/install4', 'InstallController@installPage4');
Route::post('/installStep2', 'InstallController@installStep2')->name('installStep2');

//for localization

Route::post('/installStep4', 'InstallController@installStep4')->name('installStep4');

