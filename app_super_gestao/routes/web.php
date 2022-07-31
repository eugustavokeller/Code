<?php

use Illuminate\Support\Facades\Route;

/*-------------
NAVIGATION MENU
-------------*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobre-nos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');


Route::get('/login', function () {
    return 'Login';
})->name('site.login');

/*-------------
ROTAS IMPLEMENTADAS, PRODUTOS, FORNECEDORES, CLIENTES
-------------*/

Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'Clientes';
    });
    Route::get('/fornecedores', function () {
        return 'Fornecedores';
    });
    Route::get('/produtos', function () {
        return 'Produtos';
    });
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');


Route::fallback(function() {
    echo 'Página não encontrada <a href="'.route('site.index').'">clique aqui</a> para voltar ao menu.';
});