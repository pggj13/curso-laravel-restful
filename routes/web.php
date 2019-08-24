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

/*
Route::get('/contato/contato1',function(){
    return 'contato';
})->name('rotadecontato');
Route::get('/empresa',function(){
    return view('empresa');
});

Route::get('/', function () {
    return redirect()->route('rotadecontato');
});*/

//ROUTA GRUPOS

//middleware define somente os usuarios que estão logado é que vão acessar está rota



/*
Route::group(['prefix'=>'painel','middleware'=>'auth'],function(){
    Route::get('/users', function () {
        return 'users';
    });
    Route::get('/financeiros', function () {
        return  'financeiros';
    });
    Route::get('/', function () {
        return  'dashbord';
    });
});

Route::get('/login', function () {
    return view('login');
});


//routa principal
Route::get('/', function () {
    return view('welcome');
});
*/

//Rotas usando Resource
Route::resource('/painel/produtos','Painel\ProdutoController');


Route::get('/','Site\SiteController@index');
Route::get('/contatos','Site\SiteController@contatos');


Route::group(['namespace'=>'Site','middleware'=>'auth'],function(){

    Route::get('/contato','SiteController@contato');
    
});





///Route::get('/painel/produto/testes','Painel\ProdutoController@testes');



