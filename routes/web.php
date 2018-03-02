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

Route::get('/help', function () {
    return view('help');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/actas', function () {
    return view('users.actas');
});

Route::get('/api/pdf/{carpeta}', [
		'as'	=> 'api.pdf.get',
		'uses'	=> 'Api\PDFController@index',	
	]);

Route::post('/api/pdf', [
		'as'	=> 'api.pdf.search',
		'uses'	=> 'Api\PDFController@searchTextInPDF',	
	]);
/*
*/