<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TransportationController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\UserController;
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



Route::get('/login',[AdminUserController::class,'login'])->name('admin.login');
Route::post('/do-login',[AdminUserController::class,'doLogin'])->name('admin.doLogin');

Route::group(['prefix'=>'admin'],function (){
    Route::get('/logout', [AdminUserController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth', 'check.permission']], function () {
        Route::get('/', function () {
            return view('admin.pages.home');
        })->name('admin.dashboard');

        Route::get('order/list', [OrderController::class, 'orderList'])->name('order.list');

        //product routes
        Route::get('product-list', [ProductController::class, 'productList'])->name('product.list');
        Route::get('product/create', [ProductController::class, 'productCreateForm'])->name('product.create');
        Route::post('product/store', [ProductController::class, 'productStore'])->name('product.store');
        Route::get('product/view/{product_id}', [ProductController::class, 'productDetails'])->name('product.view');
        Route::get('product/edit/{product_id}', [ProductController::class, 'productEdit'])->name('product.edit');
        Route::put('product/update/{product_id}', [ProductController::class, 'productUpdate'])->name('product.update');
        Route::get('product/delete/{product_id}', [ProductController::class, 'productDelete'])->name('product.delete');


        // category routes
        Route::get('/product/category', [CategoryController::class, 'categoryList'])->name('category.list');
        Route::get('/category/create', [CategoryController::class, 'categoryCreate'])->name('category.create');
        Route::post('/category/add', [CategoryController::class, 'add'])->name('category.store');


        // employee
        Route::get('/employee/list', [EmployeeController::class, 'list'])->name('user.list');
        Route::get('/employee/create', [EmployeeController::class, 'create'])->name('user.create');
        Route::post('/employee/store', [EmployeeController::class, 'store'])->name('user.store');
        Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('user.edit');
        Route::post('/employee/update/{id}', [EmployeeController::class, 'update'])->name('user.update');
        Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('user.delete');

        Route::get('role/list', [RoleController::class, 'index'])->name('role.list');
        Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
        Route::get('role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('role/update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::get('role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');

    });

    Route::get('/travel',[TransportationController::class,'list']);
    Route::post('/store',[TransportationController::class,'store'])->name('travel_transportation_expenses.store');
});







