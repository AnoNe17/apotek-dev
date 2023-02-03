<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WebController;

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

// Route::get('/', function () {
//     return "asd";
// });

// Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
Route::get('/', [PageController::class, 'index'])->name('home');



Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('blog')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog');

        Route::prefix('kategori')->group(function () {
            Route::get('/', [BlogController::class, 'kategori'])->name('blog.kategori');
            Route::get('/create', [BlogController::class, 'kategoriCreate'])->name('blog.kategori.create');
        });
    });

    Route::prefix('setting')->group(function () {
        Route::prefix('website')->group(function () {
            Route::get('/', [WebController::class, 'index'])->name('setting.web');
            Route::post('update', [WebController::class, 'update'])->name('setting.web.update');
        });
    });
});
