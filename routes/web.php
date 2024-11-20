<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\client\Homecontroller;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ArticlesController;
use App\Http\Controllers\admin\CategoryArticleController;
use App\Http\Controllers\admin\ProducersController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\MyAccountController;
use App\Http\Controllers\client\AuthControllerClient;
use App\Http\Controllers\client\ArticleControllerClient;
use App\Http\Controllers\client\ProductControllerClient;
use App\Http\Controllers\client\SearchController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\OrdeController;
// Client


// Admin
Route::prefix('/admin/dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->middleware('authen');    

});




Route::middleware(['authen'])->group(function () {
    
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
    
        Route::patch('/ChangeStatus/{id}/{status}/', [ArticlesController::class, 'ChangeStatus']);
    
        Route::delete('/delete/{id}', [ArticlesController::class, 'Delete']);    
    
        Route::get('/edit/{id}', [ArticlesController::class, 'edit']);
    
        Route::patch('/edit/{id}', [ArticlesController::class, 'editPatch']);
    
        Route::get('/detail/{id}', [ArticlesController::class, 'detail']);
    
        Route::patch('/changeMulti', [ArticlesController::class, 'changeMulti']);
    
    });
    
    
    
    Route::prefix('/admin/category-article')->group(function () {
    
        Route::get('/', [CategoryArticleController::class, 'index']);    
    
        Route::get('/create', [CategoryArticleController::class, 'create']); 
    
        Route::post('/create', [CategoryArticleController::class, 'createPost']); 
    
        Route::patch('/ChangeStatus/{id}/{status}/', [CategoryArticleController::class, 'ChangeStatus']);
    
        Route::delete('/delete/{id}', [CategoryArticleController::class, 'Delete']);
    
        Route::get('/edit/{id}', [CategoryArticleController::class, 'edit']);
    
        Route::patch('/edit/{id}', [CategoryArticleController::class, 'editPatch']);
    
        Route::get('/detail/{id}', [CategoryArticleController::class, 'detail']);
    
        Route::patch('/changeMulti', [CategoryArticleController::class, 'changeMulti']);
    
    });
    
    
    
    Route::prefix('admin/product')->group(function () {
        // ->middleware('authen')
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
    
    
    
    Route::prefix('admin/producers')->group(function () {
    
        Route::get('/', [ProducersController::class, 'index']);
    
        Route::delete('/delete/{id}', [ProducersController::class, 'Delete']);
    
        Route::get('/create', [ProducersController::class, 'create']);
    
        Route::post('/create', [ProducersController::class, 'createPost']);
    
        Route::get('/edit/{id}', [ProducersController::class, 'edit']);
    
        Route::patch('/edit/{id}', [ProducersController::class, 'editPatch']);
    
    });
    
    
    Route::prefix('admin/unit')->group(function () {
    
        Route::get('/', [UnitController::class, 'index']);
    
        Route::delete('/delete/{id}', [UnitController::class, 'Delete']);
    
        Route::get('/create', [UnitController::class, 'create']);
    
        Route::post('/create', [UnitController::class, 'createPost']);
    
        Route::get('/edit/{id}', [UnitController::class, 'edit']);
    
        Route::patch('/edit/{id}', [UnitController::class, 'editPatch']);
    
    });
    
    
    Route::prefix('admin/account')->group(function () {
    
        Route::get('/', [AccountController::class, 'index']);   
    
        Route::patch('/ChangeStatus/{id}/{status}/', [AccountController::class, 'ChangeStatus']);
    
        Route::patch('/changeMulti', [AccountController::class, 'changeMulti']);
    
        Route::delete('/delete/{id}', [AccountController::class, 'Delete']);
    
        Route::get('/create', [AccountController::class, 'create']);
    
        Route::post('/create', [AccountController::class, 'createPost']);
    
        Route::get('/edit/{id}', [AccountController::class, 'edit']);
    
        Route::patch('/edit/{id}', [AccountController::class, 'editPatch']);
    
        Route::get('/detail/{id}', [AccountController::class, 'detail']);
    
    });


    Route::prefix('admin/my-account')->group(function () {
    
        Route::get('/{id}', [MyAccountController::class, 'index']);   
        
        Route::get('/edit/{id}', [MyAccountController::class, 'edit']); 
        
        Route::patch('/edit/{id}', [MyAccountController::class, 'editPatch']);
    
    });
    
});





Route::prefix('admin/auth')->group(function () {

    Route::get('/login', [AuthController::class, 'login']);

    Route::post('/login', [AuthController::class, 'loginPost']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['authenclient', 'category', 'cart'])->group(function () {


    Route::get('/', [HomeController::class, 'index']);   

    Route::prefix('/user')->group(function () {

        Route::get('/login', [AuthControllerClient::class, 'login']);

        Route::get('/register ', [AuthControllerClient::class, 'register']);

        Route::post('/register ', [AuthControllerClient::class, 'registerPost']);

        Route::post('/login', [AuthControllerClient::class, 'loginPost']);

        Route::get('/logout', [AuthControllerClient::class, 'logout']);

        Route::get('/password/forgot', [AuthControllerClient::class, 'forgotPassword']);

        Route::post('/password/forgot', [AuthControllerClient::class, 'forgotPasswordPost']);

        Route::get('/infor', [AuthControllerClient::class, 'infor'])->middleware('user123');

        Route::patch('/edit/{id}', [AuthControllerClient::class, 'editPatch']);
    });

    Route::prefix('/article')->group(function () {
    
        Route::get('/', [ArticleControllerClient::class, 'index']);    
    
        Route::get('/detail/{id}', [ArticleControllerClient::class, 'detail']);    

        Route::get('/{id}', [ArticleControllerClient::class, 'CategoryMenu']);    
    
    });


    Route::prefix('/product')->group(function () {
    
        Route::get('/', [ProductControllerClient::class, 'index']);    
    
        Route::get('/detail/{id}', [ProductControllerClient::class, 'detail']);    

        Route::get('/{id}', [ProductControllerClient::class, 'CategoryMenu']);    
    
    });


    Route::prefix('/cart')->group(function () {
        
        
        Route::get('/', [CartController::class, 'index']);

        Route::post('/add/{productId}', [CartController::class, 'addPost']);    

        Route::get('/delete/{productId} ', [CartController::class, 'delete']);

        Route::get('/update/{productId}/{quantity}', [CartController::class, 'update']);
      
    });


    Route::prefix('/checkout')->group(function () {
        
        
        Route::get('/', [OrdeController::class, 'index']);

        Route::post('/order', [OrdeController::class, 'order']);

        Route::get('/success/{orderId}', [OrdeController::class, 'success']);
    });


    Route::prefix('/search')->group(function () {
    
        Route::get('/', [SearchController::class, 'index']);    
    
        Route::get('/detail/{id}', [SearchController::class, 'detail']);    

        Route::get('/{id}', [SearchController::class, 'CategoryMenu']);    
    
    });
});