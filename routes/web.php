<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'welcome'])->name('welcome');
Route::get('/groups', [PagesController::class, 'groups'])->name('groups');
Route::get('/teachers', [PagesController::class, 'teachers'])->name('teachers');
Route::get('/achievements', [PagesController::class, 'achievements'])->name('achievements');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('gallery');
Route::get('/blogs', [PagesController::class, 'blogs'])->name('blogs');
