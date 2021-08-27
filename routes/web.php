<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;

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


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/intro', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/panel', [PanelController::class, 'index'])->name('panel.index');
        Route::post('/panel', [PanelController::class, 'store'])->name('panel.store');
        Route::get('/post/create', [PanelController::class, 'create'])->name('panel.create');
        Route::post('/post/create', [PanelController::class, 'store'])->name('panel.store');

        Route::get('/post/delete/{post}', [PanelController::class, 'destroy'])->name('panel.destroy');

        Route::get('/post/edit/{post}', [PanelController::class, 'edit'])->name('panel.edit');
        Route::post('/post/{post}', [PanelController::class, 'update'])->name('panel.update');
    });
});