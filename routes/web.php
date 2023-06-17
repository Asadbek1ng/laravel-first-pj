<?php

use App\Http\Controllers\Admin\HumanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\NumberController;
use App\Http\Controllers\PagesController;

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

Route::auto('/', PagesController::class);

Route::get('/lang/{lang}', function($lang){
    session(['lang' => $lang]);
    return back();
});

// Admin routes start

Route::prefix('admin/')->name('admin.')->middleware(['auth'])->group(function(){

    Route::get('dashboard', function(){
        return view('admin.layouts.dashboard');
    })->name('dashboard');

    Route::resources([
        'infos' => InfoController::class,
        'numbers' => NumberController::class,
        'humans'=> HumanController::class,
    ]);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
