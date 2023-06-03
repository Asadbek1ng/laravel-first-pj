<?php

use App\Http\Controllers\Admin\HumanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\NumberController;

/*
|---------------------------------------------------------------------




-----
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'welcome'])->name('welcome');
Route::get('/groups', [PagesController::class, 'groups'])->name('groups');
Route::get('/teachers', [PagesController::class, 'teachers'])->name('teachers');
Route::get('/wins', [PagesController::class, 'wins'])->name('wins');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('gallery');
Route::get('/blogs', [PagesController::class, 'blogs'])->name('blogs');

Route::post('/order/store', [PagesController::class, 'store'])->name('order.store');

// Admin routes start

Route::prefix('admin/')->name('admin.')->group(function(){

    Route::get('dashboard', function(){
        return view('admin.layouts.dashboard');
    })->name('dashboard');

    Route::resource('infos', InfoController::class);
    Route::resource('numbers', NumberController::class);
    Route::resource('humans', HumanController::class);

});
