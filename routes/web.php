<?php
Route::get('/', 'LoginController@index')->name('/');
Route::get('registro', 'RegistroController@index')->name('registro');
Route::get('inicio', 'InicioController@inicio')->name('inicio');
Route::get('tipos-clientes', 'JsonController@getUsersAll')->name('tipos-clientes');
Route::get('muestras-recepcionadas', 'MuestrasController@getSamplesByReceiving')->name('muestras-recepcionadas');
Route::get('muestras-resolucionadas', 'MuestrasController@getSamplesToBeResolved')->name('muestras-resolucionadas');
Route::get('buscador-muestras', 'JsonController@getSamplesByCodeOrRun')->name('buscador-muestras');
Route::get('buscador-muestras-recepcionadas', 'JsonController@getSamplesByCodeOrRunReceived')->name('buscador-muestras-recepcionadas');
Route::get('reportes', 'ReportesController@index')->name('reportes');

Route::post('login', 'LoginController@login')->name('login');
Route::post('logout', 'LoginController@logout')->name('logout');
Route::post('registrar', 'RegistroController@registro')->name('registrar');

Route::resource('usuarios', 'UsuariosController');
Route::resource('muestras', 'MuestrasController');