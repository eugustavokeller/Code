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

/*
-------------
NAVIGATION MENU
-------------
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobre-nos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');


Route::get('/login', function () {
    return 'Login';
})->name('site.login');
/*
-------------
ROTAS IMPLEMENTADAS, PRODUTOS, FORNECEDORES, CLIENTES
-------------
*/
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


//verbo http - 

// get
// post
// put
// patch
// delete
// options