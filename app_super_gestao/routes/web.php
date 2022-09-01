<?php

use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*-------------
NAVIGATION MENU
-------------*/
Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login', function () {return 'Login';})->name('site.login');

/*-------------
APPLICATION
-------------*/
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function () {
    Route::get('/clientes', function () {return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function () {return 'Produtos';})->name('app.produtos');
});

/*-------------
OTHERS TEST
-------------*/
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');
Route::get('/notfound', 'NotFoundController@notfound')->name('notfound');

/*-------------
FALLBACK
-------------*/
Route::fallback(function () {return view('site.notfound', ['titulo' => 'Nao Encontrada']);});
