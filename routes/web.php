<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\client\Homecontroller;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ArticlesController;
use App\Http\Controllers\admin\CategoryArticleController;
// Client
Route::get('/', [HomeController::class, 'index']);   




// Admin

Route::prefix('/admin/dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);    

});

Route::prefix('/admin/category')->group(function () {

    Route::get('/', [CategoryController::class, 'index']);    

    Route::get('/create', [CategoryController::class, 'create']); 

    Route::post('/create', [CategoryController::class, 'createPost']); 

    Route::patch('/ChangeStatus/{id}/{status}/', [CategoryController::class, 'ChangeStatus']);

    Route::delete('/delete/{id}', [CategoryController::class, 'Delete']);

    Route::get('/edit/{id}', [CategoryController::class, 'edit']);

    Route::patch('/edit/{id}', [CategoryController::class, 'editPatch']);

    Route::get('/detail/{id}', [CategoryController::class, 'detail']);

    Route::patch('/changeMulti', [CategoryController::class, 'changeMulti']);

});



Route::prefix('/admin/article')->group(function () {

    Route::get('/', [ArticlesController::class, 'index']);    

    Route::get('/create', [ArticlesController::class, 'create']); 

    Route::post('/create', [ArticlesController::class, 'createPost']); 

    // Route::patch('/ChangeStatus/{id}/{status}/', [CategoryController::class, 'ChangeStatus']);

    // Route::delete('/delete/{id}', [CategoryController::class, 'Delete']);

    // Route::get('/edit/{id}', [CategoryController::class, 'edit']);

    // Route::patch('/edit/{id}', [CategoryController::class, 'editPatch']);

    // Route::get('/detail/{id}', [CategoryController::class, 'detail']);

    // Route::patch('/changeMulti', [CategoryController::class, 'changeMulti']);

});



Route::prefix('/admin/category-article')->group(function () {

    Route::get('/', [CategoryArticleController::class, 'index']);    

    Route::get('/create', [CategoryArticleController::class, 'create']); 

    Route::post('/create', [CategoryArticleController::class, 'createPost']); 

    Route::patch('/ChangeStatus/{id}/{status}/', [CategoryArticleController::class, 'ChangeStatus']);

    Route::delete('/delete/{id}', [CategoryArticleController::class, 'Delete']);

    Route::get('/edit/{id}', [CategoryArticleController::class, 'edit']);

    // Route::patch('/edit/{id}', [CategoryController::class, 'editPatch']);

    // Route::get('/detail/{id}', [CategoryController::class, 'detail']);

    // Route::patch('/changeMulti', [CategoryController::class, 'changeMulti']);

});



Route::prefix('admin/product')->group(function () {

    Route::get('/', [ProductController::class, 'index']);

    Route::patch('/ChangeStatus/{id}/{status}/', [ProductController::class, 'ChangeStatus']);

    Route::patch('/changeMulti', [ProductController::class, 'changeMulti']);

    Route::delete('/delete/{id}', [ProductController::class, 'Delete']);

    Route::get('/create', [ProductController::class, 'create']);

    Route::post('/create', [ProductController::class, 'createPost']);

    Route::get('/edit/{id}', [ProductController::class, 'edit']);

    Route::patch('/edit/{id}', [ProductController::class, 'editPatch']);

    Route::get('/detail/{id}', [ProductController::class, 'detail']);
});