<?php

use App\Http\Controllers\Backend\LoginController as BackendLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PermissionController;



// Route::group(['prefix' => 'admin'],function(){
//login 
Route::get('/',[BackendLogin::class,'login'])->name('login');
Route::post('/login/post',[BackendLogin::class,'loginpost'])->name('login.post');
Route::get('/logout',[BackendLogin::class,'logout'])->name('logout');

//role
Route::get('/role/list',[RoleController::class,'roleList'])->name('admin.role.list');
//permission
Route::get('/permission/list',[PermissionController::class, 'permissionList'])->name('permission.list');
//assign permission 
Route::get('assign/permission/form',[PermissionController::class,'assignPermission'])->name('assign.permission.form');
Route::post('assign/permission/post',[PermissionController::class,'assignPermissionPost'])->name('assign.permission.post');
Route::get('/assign/permission/list',[PermissionController::class,'assignPermissionList'])->name('assign.permission.list');
//add user from admin panel
Route::get('/user/list',[UserController::class,'userList'])->name('user.list');
Route::get('/add/user',[UserController::class,'adduser'])->name('user.add');
Route::post('/user/post',[UserController::class,'userpost'])->name('user.post');




// });