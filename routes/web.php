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

// rotas para login/logout
Route::get('/','indexController@index')->name('index');
Route::get('/anteriores','indexController@anteriores')->name('anteriores');
Route::get('login','LoginController@redirectToProvider')->name('login');
Route::get('callback', 'LoginController@handleProviderCallback');
Route::get('logout','LoginController@logout')->name('logout');

// rotas de Agendamento de Defesa
Route::resource('agendamentos','AgendamentoController');

// rotas de Banca das Defesas
Route::get('/agendamentos/{agendamento}/bancas/create','BancaController@create');
Route::get('/agendamentos/{agendamento}/bancas/{banca}/edit','BancaController@edit');
Route::patch('/agendamentos/{agendamento}/bancas/{banca}','BancaController@update');
Route::post('/agendamentos/{agendamento}/bancas','BancaController@store');
Route::delete('/agendamentos/{agendamento}/bancas/{banca}','BancaController@destroy');

// rotas para pdfs
Route::get('/agendamentos/{agendamento}/{tipo}','PdfController@documentosGerais');
Route::get('/agendamentos/{agendamento}/bancas/{banca}/{tipo}','PdfController@documentosIndividuais');
Route::post('/agendamentos/{agendamento}/bancas/{banca}/recibos/proex','PdfController@proex');
Route::post('/agendamentos/{agendamento}/bancas/{banca}/recibos/proap','PdfController@proap');
Route::post('/agendamentos/{agendamento}/bancas/{banca}/recibos/passagem','PdfController@passagem');
Route::post('/agendamentos/{agendamento}/bancas/{banca}/recibos/passagemAuxilio','PdfController@passagemAuxilio');

// rotas para configs
Route::get('/configs','ConfigController@edit');
Route::post('/configs','ConfigController@store');

// rotas para recibos
Route::post('/agendamentos/{agendamento}/bancas/{banca}/recibos/reciboExterno','EmailController@reciboExterno');
Route::post('/agendamentos/{agendamento}/bancas/{banca}/recibos/emailDocente','EmailController@emailDocente');

