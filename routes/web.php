<?php

use App\Http\Controllers\API\ProductoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagoController;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [DashboardController::class, 'show'])->name('dashboard');

Route::group(['prefix' => 'publicacion' /*,'middleware' => ['auth:api']]))*/], function () {

    Route::post('/',[PublicacionController::class, 'store']);//->middleware('scopes:altaProducto');
    Route::get('/',[PublicacionController::class, 'index']);
    /*sacar*/Route::get('/{id}',[PublicacionController::class, 'show']);
    Route::delete('/{id}',[PublicacionController::class, 'destroy']);
    //Route::get('/publicacion/{id}',[PublicacionController::class, 'getPublicacionByProducto'])->middleware('scopes:altaProducto');
});

Route::group(['prefix' => 'comentario', 'middleware' => ['auth:api']], function () {

    Route::post('/',[ComentarioController::class, 'store']);//->middleware('scopes:altaProducto');
    Route::get('/{id}',[ComentarioController::class, 'show']);
    //Route::delete('/{id}',[PublicacionController::class, 'destroy']);
    //Route::get('/publicacion/{id}',[PublicacionController::class, 'getPublicacionByProducto'])->middleware('scopes:altaProducto');
});

Route::group(['prefix' => 'pago'/*, 'middleware' => ['auth:api']*/], function () {

    Route::get('/', [PagoController::class, 'verVistaPago']);
    Route::post('/',[PagoController::class, 'realizarPago']);
});

Route::group(['prefix' => 'busqueda'], function () {

    Route::get('/productos/{criterio}', [ProductoController::class, 'buscarProducto']);
});

Auth::routes();