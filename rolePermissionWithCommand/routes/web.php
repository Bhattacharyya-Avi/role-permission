<?php

use App\Http\Controllers\Backend\LoginController as BackendLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Frontend\ProductController;

//login
Route::get('/',[BackendLogin::class,'login'])->name('login');
Route::post('/login/post',[BackendLogin::class,'loginpost'])->name('login.post');
Route::get('/registration',[BackendLogin::class,'registration'])->name('registration');
Route::post('/registration/post',[BackendLogin::class,'registrationPost'])->name('registration.post');
Route::get('/logout',[BackendLogin::class,'logout'])->name('logout');
Route::group(['middleware'=>'auth'],function(){

    //role
    Route::group(['prefix'=>'role'],function(){
        Route::get('/list',[RoleController::class,'roleList'])->name('admin.role.list');
    });

    //permission
    Route::group(['prefix'=>'permission'],function(){
        Route::get('/list',[PermissionController::class, 'permissionList'])->name('permission.list');
    });

    //assign permission
    Route::group(['prefix'=>'assign'],function(){
        Route::get('/permission/form',[PermissionController::class,'assignPermission'])->name('assign.permission.form');
        Route::post('/permission/post',[PermissionController::class,'assignPermissionPost'])->name('assign.permission.post');
        Route::get('/permission/list',[PermissionController::class,'assignPermissionList'])->name('assign.permission.list');
        Route::get('/edit/permission/{role_id}',[PermissionController::class,'editPermission'])->name('edit.assigned.permission');
        Route::post('/update/permission/{role_id}',[PermissionController::class,'updatePermission'])->name('update.assigned.permission');
    });

    //add user from admin panel
   Route::group(['prefix'=>'user'],function(){
        Route::get('/user/list',[UserController::class,'userList'])->name('user.list');
        Route::get('/add/user',[UserController::class,'adduser'])->name('user.add');
        Route::post('/user/post',[UserController::class,'userpost'])->name('user.post');
   }); 
    
    Route::group(['middleware'=>'checkPermission'],function(){
        Route::group(['prefix'=>'product'],function(){
            Route::get('/view',[ProductController::class,'view'])->name('view.product');
            Route::get('/create/product',[ProductController::class,'create'])->name('create.product');
        });
        
    });
});
