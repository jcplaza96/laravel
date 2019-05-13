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


Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => 'auth'], function () {
    //Route::get('/excel', 'analisisController@getDatos');

    Route::get('/empresas', 'EmpresasController@getList');
    Route::get('/empresas/create', 'EmpresasController@getCreate');
    Route::post('empresas/create', 'EmpresasController@postCreate');
    Route::get('/empresas/{empresa_id}', 'EmpresasController@getDetails');
    Route::get('/empresas/{empresa_id}/edit', 'EmpresasController@getEdit');
    Route::put('/empresas/{empresa_id}/edit', 'EmpresasController@putEdit');

    Route::get('/empresas/{empresa_id}/balances/{balance_id}/edit', 'BalancesController@getEdit');
    Route::put('/empresas/{empresa_id}/balances/{balance_id}/edit', 'BalancesController@putEdit');
    Route::get('/empresas/{empresa_id}/balances/import', 'BalancesController@getImport');
    Route::post('/empresas/{empresa_id}/balances/import', 'BalancesController@postImport');
    Route::get('/empresas/{empresa_id}/balances/add', 'BalancesController@getCreate');
    Route::post('/empresas/{empresa_id}/balances/add', 'BalancesController@postCreate');
    Route::get('/empresas/{empresa_id}/balances/{balance_id}', 'BalancesController@getDetails');

    Route::get( '/empresas/{empresa_id}/perdidasGanancias/{balance_id}/edit', 'perdidasGananciasController@getEdit');
    Route::put('/empresas/{empresa_id}/perdidasGanancias/{balance_id}/edit', 'perdidasGananciasController@putEdit');
    Route::get('/empresas/{empresa_id}/perdidasGanancias/import', 'perdidasGananciasController@getImport');
    Route::post('/empresas/{empresa_id}/perdidasGanancias/import', 'perdidasGananciasController@postImport');
    Route::get('/empresas/{empresa_id}/perdidasGanancias/add', 'perdidasGananciasController@getCreate');
    Route::post('/empresas/{empresa_id}/perdidasGanancias/add', 'perdidasGananciasController@postCreate');
    Route::get('/empresas/{empresa_id}/perdidasGanancias/{balance_id}', 'perdidasGananciasController@getDetails');
});


Auth::routes();

