<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\API\ProductoController;
use App\Http\Controllers\API\CartController;

Auth::routes();

Route::group(['prefix' => 'producto', 'middleware' => ['auth:api']], function () {

    Route::post('/',[ProductoController::class, 'store'])->middleware('scopes:altaProducto');
    Route::get('/',[ProductoController::class, 'index']);
    Route::get('/{id}',[ProductoController::class, 'show']);
    Route::put('/{id}',[ProductoController::class, 'update'])->middleware('scopes:updateProducto');
    Route::delete('/{id}',[ProductoController::class, 'destroy'])->middleware('scopes:bajaProducto');
    //Route::get('/publicacion/{id}',[ProductoController::class, 'getPublicacionByProducto'])->middleware('scopes:altaProducto');
});

Route::apiResource('/rol', 'App\Http\Controllers\API\RoleController')->middleware(['auth:api', 'scopes:ABMRoles']);

Route::apiResource('/permiso', 'App\Http\Controllers\API\PermisoController')->middleware(['auth:api', 'scopes:ABMPermisos']);

Route::apiResource('/carrito', 'App\Http\Controllers\API\CartController')->middleware(['auth:api']);

//endpoint Quitar permiso a ROL