<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\SuIzleme;
use App\Http\Controllers\SuIzlemeController;
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

require __DIR__ . '/auth.php';

Route::group(['middleware'=>'auth'], function () {
    Route::get('/home', fn()=>view('index'))->name('home');
    Route::post('/logout', [AuthenticatedSessionController::class, 'Logout'])->name('logout');

    // sayfaların rotaları burada
    Route::group(['prefix' => 'pagination'], function () {
        Route::get('/eisenhower', [PageController::class, 'eisenhower'])->name('pagination.eisenhower');
        Route::get('/suIzleme', [SuIzlemeController::class, 'index'])->name('pagination.suIzleme');
        Route::get('/suIzleme/Store', [SuIzlemeController::class, 'store'])->name('pagination.suIzleme.store');
        Route::post('/suIzleme/Create', [SuIzlemeController::class, 'create'])->name('pagination.suIzleme.create');
        Route::post('/suIzleme/CompCreate', [SuIzlemeController::class, 'companyCreate'])->name('pagination.suIzleme.CompCreate');
        Route::post('/suIzleme/CompDelete', [SuIzlemeController::class, 'companyDelete'])->name('pagination.suIzleme.CompDelete');
        Route::get('/suIzleme/Show/{id}', [SuIzlemeController::class, 'show'])->name('pagination.suIzleme.show');

    });

    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});

// Index sayfası ve yönlendirme
Route::get('', [RoutingController::class, 'index'])->name('root');
