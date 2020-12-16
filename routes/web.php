<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todo\TodoController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\Manager\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Interia\Manager\UserController as InteriaUserController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('todo')->group(function () {

    Route::get('/', [TodoController::class, 'list'] )->name('todo-list');
    Route::get('/unfinished', [TodoController::class, 'unfinished'] )->name('unfinished');
    Route::get('/finished', [TodoController::class, 'finished'] )->name('finished');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::post('/update/{id}', [TodoController::class, 'update'])->name('update');
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
    Route::get('/detail/{id}', [TodoController::class, 'detail'])->name('detail');
    Route::get('/destroy/{id}', [TodoController::class, 'destroy'])->name('destroy');

});

Route::prefix('manager')->group(function () {

    Route::get('/', [ManagerController::class, 'dashboard'] )->name('dashboard');
    Route::get('/analytic', [ManagerController::class, 'analytic'] )->name('analytic');

    Route::prefix('/user')->group(function () {

        Route::get('/', [UserController::class, 'user'] )->name('user');
        Route::post('/search', [UserController::class, 'search'])->name('user.search');
        Route::get('/detail/{id}', [UserController::class, 'detail'])->name('user.detail');

    });

    Route::prefix('/role')->group(function () {

        Route::get('/', [RoleController::class, 'role'] )->name('role');
        Route::get('/detail/{id}', [RoleController::class, 'detail'])->name('role.detail');

    });

    Route::prefix('/users')->group(function () {

        Route::get('/', [InteriaUserController::class, 'show'] )->name('users.show');
        Route::patch('/update/{id}', [InteriaUserController::class, 'update'] )->name('users.update');
        Route::patch('/store', [InteriaUserController::class, 'store'] )->name('users.store');
    });

});


