<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ListadoProductosController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Dashboard/Dashboard');

Route::get('/listado-productos', [ListadoProductosController::class, 'index']);

Route::group(['prefix' => 'publicacion', 'middleware' => ['auth:api']], function () {

    Route::post('/', [PostController::class, 'store']); //->middleware('scopes:altaProducto');
    Route::get('/', [PostController::class, 'index']);
    /*sacar*/
    Route::get('/{id}', [PostController::class, 'show']);
    Route::delete('/{id}', [PostController::class, 'destroy']);
    //Route::get('/Post/{id}',[PostController::class, 'getPostByProducto'])->middleware('scopes:altaProducto');
});

Route::group(['prefix' => 'comentario', 'middleware' => ['auth:api']], function () {

    Route::post('/', [CommentController::class, 'store']); //->middleware('scopes:altaProducto');
    Route::get('/{id}', [CommentController::class, 'show']);
    //Route::delete('/{id}',[PostController::class, 'destroy']);
    //Route::get('/Post/{id}',[PostController::class, 'getPostByProducto'])->middleware('scopes:altaProducto');
});

Route::group(['prefix' => 'pago', 'middleware' => ['auth:api']], function () {

    Route::get('/', [PaymentController::class, 'verVistaPago']);
    Route::post('/', [PaymentController::class, 'realizarPago']);
});

Route::group(['prefix' => 'busqueda'], function () {

    Route::get('/productos/{criterio}', [ProductController::class, 'buscarProducto']);
});

Route::post('/ingresar', [LoginController::class, 'authenticate']);
Route::get('/ingresar', [LoginController::class, 'show'])->name("login");

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'register']);
