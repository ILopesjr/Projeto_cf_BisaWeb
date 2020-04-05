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
    return view('master');
});

Route::resource('conta_bancarias', 'ContaBancariaController');
Route::resource('movimentacao_financeiras', 'MovimentacaoFinanceiraController');
Route::resource('relatorios', 'RelatorioController');