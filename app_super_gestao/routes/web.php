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

Route::get('/rota1', function () {
    echo 'Rota 1';
})->name('site.rota1');


Route::get('/rota2', function () {
    return redirect(route('site.rota1'));
})->name('site.rota2'); // Redirecionamento na funcão Callback...

// Route::redirect('/rota2', 'rota1');  // Redirecionamento na Route

Route::fallback(function() {
    echo 'Página não encontrada <a href="'.route('site.index').'">clique aqui</a> para voltar ao menu.';
});