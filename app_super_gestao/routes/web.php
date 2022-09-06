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
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

/*-------------
APPLICATION
-------------*/
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function () {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto', 'ProdutoController@index')->name('app.produto');
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
