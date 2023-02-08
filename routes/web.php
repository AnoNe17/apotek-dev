<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SaranController;
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
Route::post('store', [SaranController::class, 'store'])->name('saran.store');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('blog')->group(function () {
        Route::prefix('postingan')->group(function () {
            Route::get('/', [BlogController::class, 'postingan'])->name('blog.postingan');
            Route::get('create', [BlogController::class, 'postinganCreate'])->name('blog.postingan.create');
            Route::post('store', [BlogController::class, 'postinganStore'])->name('blog.postingan.store');
            Route::get('edit/{id}', [BlogController::class, 'postinganEdit'])->name('blog.postingan.edit');
            Route::post('update', [BlogController::class, 'postinganUpdate'])->name('blog.postingan.update');
            Route::post('delete', [BlogController::class, 'postinganDelete'])->name('blog.postingan.delete');
        });

        Route::prefix('kategori')->group(function () {
            Route::get('/', [BlogController::class, 'kategori'])->name('blog.kategori');
            Route::get('create', [BlogController::class, 'kategoriCreate'])->name('blog.kategori.create');
            Route::post('store', [BlogController::class, 'kategoriStore'])->name('blog.kategori.store');
            Route::get('edit/{id}', [BlogController::class, 'kategoriEdit'])->name('blog.kategori.edit');
            Route::post('update', [BlogController::class, 'kategoriUpdate'])->name('blog.kategori.update');
            Route::post('delete', [BlogController::class, 'kategoriDelete'])->name('blog.kategori.delete');
        });
    });

    Route::prefix('produk')->group(function () {
        Route::prefix('kategori')->group(function () {
            Route::get('/', [ProdukController::class, 'kategori'])->name('produk.kategori');
            Route::get('create', [ProdukController::class, 'kategoriCreate'])->name('produk.kategori.create');
            Route::post('store', [ProdukController::class, 'kategoriStore'])->name('produk.kategori.store');
            Route::get('edit/{id}', [ProdukController::class, 'kategoriEdit'])->name('produk.kategori.edit');
            Route::post('update', [ProdukController::class, 'kategoriUpdate'])->name('produk.kategori.update');
            Route::post('delete', [ProdukController::class, 'kategoriDelete'])->name('produk.kategori.delete');
        });
    });

    Route::prefix('saran')->group(function () {
        Route::get('/', [SaranController::class, 'index'])->name('saran');
    });

    Route::prefix('layanan')->group(function () {
        Route::get('/', [LayananController::class, 'index'])->name('layanan');
        Route::get('create', [LayananController::class, 'create'])->name('layanan.create');
        Route::post('store', [LayananController::class, 'store'])->name('layanan.store');
        Route::get('edit/{id}', [LayananController::class, 'edit'])->name('layanan.edit');
        Route::post('update', [LayananController::class, 'update'])->name('layanan.update');
        Route::post('delete', [LayananController::class, 'delete'])->name('layanan.delete');
    });

    Route::prefix('setting')->group(function () {
        Route::prefix('website')->group(function () {
            Route::get('/', [WebController::class, 'index'])->name('setting.web');
            Route::post('update', [WebController::class, 'update'])->name('setting.web.update');

            Route::post('misiStore', [WebController::class, 'misiStore'])->name('setting.web.misi.store');
            Route::post('misiDelete', [WebController::class, 'misiDelete'])->name('setting.web.misi.delete');

            Route::post('mitraStore', [WebController::class, 'mitraStore'])->name('setting.web.mitra.store');
            Route::post('mitraDelete', [WebController::class, 'mitraDelete'])->name('setting.web.mitra.delete');
        });
    });
});
