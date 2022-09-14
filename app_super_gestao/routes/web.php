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
    
    // home
    Route::get('/home', 'HomeController@index')->name('app.home');
    // sair
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    // clientes
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');

    // fornecedores
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar/{msg?}', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar/', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    // produtos
    Route::resource('/produto', 'ProdutoController');
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
