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
        Route::prefix('postingan')->group(function () {
            Route::get('/', [BlogController::class, 'postingan'])->name('blog.postingan');
            Route::get('/create', [BlogController::class, 'postinganCreate'])->name('blog.postingan.create');
            Route::post('/store', [BlogController::class, 'postinganStore'])->name('blog.postingan.store');
            Route::get('/edit/{id}', [BlogController::class, 'postinganEdit'])->name('blog.postingan.edit');
            Route::post('/update', [BlogController::class, 'postinganUpdate'])->name('blog.postingan.update');
            Route::post('/delete', [BlogController::class, 'postinganDelete'])->name('blog.postingan.delete');
        });

        Route::prefix('kategori')->group(function () {
            Route::get('/', [BlogController::class, 'kategori'])->name('blog.kategori');
            Route::get('/create', [BlogController::class, 'kategoriCreate'])->name('blog.kategori.create');
            Route::post('/store', [BlogController::class, 'kategoriStore'])->name('blog.kategori.store');
            Route::get('/edit/{id}', [BlogController::class, 'kategoriEdit'])->name('blog.kategori.edit');
            Route::post('/update', [BlogController::class, 'kategoriUpdate'])->name('blog.kategori.update');
            Route::post('/delete', [BlogController::class, 'kategoriDelete'])->name('blog.kategori.delete');
        });
    });

    Route::prefix('setting')->group(function () {
        Route::prefix('website')->group(function () {
            Route::get('/', [WebController::class, 'index'])->name('setting.web');
            Route::post('update', [WebController::class, 'update'])->name('setting.web.update');
        });
    });
});
