<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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
Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin_dashboard', [App\Http\Controllers\HomeController::class, 'dashboard']);
// 'middleware' => 'api',
Route::group(['prefix'=> 'admin'], function ($routes) {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/level', [AdminController::class, 'level'])->name('admin.settings.level');
    Route::get('/level/create', [AdminController::class, 'createLevel'])->name('admin.settings.level.create');
    Route::post('/level/store', [AdminController::class, 'storeLevel'])->name('admin.settings.level.store');
    Route::get('/level/show/{id}', [AdminController::class, 'editLevel'])->name('admin.settings.level.edit');
    Route::post('/level/update/{id}', [AdminController::class, 'updateLevel'])->name('admin.settings.level.update');
    Route::get('/level/delete/{id}', [AdminController::class, 'deleteLevel'])->name('admin.settings.level.delete');
});


