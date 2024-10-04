<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DashboardController;
Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/admin/dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);    

});


// Route::post('admin/product/create/{id}/{status}', [ProductController::class, 'create']);
Route::prefix('admin/product')->group(function () {

    Route::get('/', [ProductController::class, 'index']);

    // Route::POST('/create/{id}/{status}', [ProductController::class, 'create']);

    // Route::patch('/create', [ProductControlle    r::class, 'createPost']);

    Route::patch('/ChangeStatus/{id}/{status}/', [ProductController::class, 'ChangeStatus']);

    Route::patch('/changeMulti', [ProductController::class, 'changeMulti']);

    Route::delete('/delete/{id}', [ProductController::class, 'Delete']);
});