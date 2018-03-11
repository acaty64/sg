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

Route::get('/files', function () {
    return view('users.files');
});

Route::get('/actas', function () {
    return view('users.actas');
});

Route::post('/pdfUpload', [
		'as'	=> 'admin.pdf.upload',
		'uses'	=> 'Admin\PDFController@upload',
	]);

Route::get('/api/pdf/{carpeta}', [
		'as'	=> 'api.pdf.get',
		'uses'	=> 'Api\PDFController@index',	
	]);

Route::post('/api/pdf', [
		'as'	=> 'api.pdf.search',
		'uses'	=> 'Api\PDFController@searchTextInPDF',	
	]);

Route::get('/admin/view/pdf/{carpeta}/{acta}', [
		'as'	=> 'view.pdf.search',
		'uses'	=> 'Admin\PDFController@viewActa',	
	]);

