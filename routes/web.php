<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EisenhowerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParselController;
use App\Http\Controllers\ParselSorguController;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\SuIzleme;
use App\Http\Controllers\SuIzlemeController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserProfilController;
use App\Livewire\Eisenhower;
use App\Livewire\LiveEisenhover;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;





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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', fn() => view('index'))->name('home');
    Route::post('/logout', [AuthenticatedSessionController::class, 'Logout'])->name('logout');

    // sayfaların rotaları burada
    Route::group(['prefix' => 'pagination'], function () {

        //Eisenhower
        Route::resource('/eisenhower', EisenhowerController::class)->names([
            'index'   => 'eisenhower.index',
        ]);

        Route::delete('/item/{id}', [LiveEisenhover::class, 'destroy'])->name('item.destroy');
        // su izleme
        Route::get('/suIzleme', [SuIzlemeController::class, 'index'])->name('pagination.suIzleme');
        Route::get('/suIzleme/Store', [SuIzlemeController::class, 'store'])->name('pagination.suIzleme.store');
        Route::post('/suIzleme/Create', [SuIzlemeController::class, 'create'])->name('pagination.suIzleme.create');
        Route::get('/suIzleme/Show/{id}', [SuIzlemeController::class, 'show'])->name('pagination.suIzleme.show');
        // su izleme bitiş
        // profil işlemleri
        Route::get('/profile', [UserProfilController::class, 'index'])->name('pagination.user.profil');
        Route::post('/profile/Update', [UserProfilController::class, 'update'])->name('pagination.user.update');
        // profil işlemleri bitiş
    });

    //admin routları burada
    Route::middleware(['checkrole:super-admin'])->group(function () {
        Route::get('/user', [UserAdminController::class, 'index'])->name('user.index');
        Route::post('/user/store', [UserAdminController::class, 'store'])->name('users.store');
        Route::put('/users/{id}', [UserAdminController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserAdminController::class, 'destroy'])->name('users.destroy');

        Route::post('/suIzleme/CompCreate', [SuIzlemeController::class, 'companyCreate'])->name('pagination.suIzleme.CompCreate');
        Route::post('/suIzleme/CompDelete', [SuIzlemeController::class, 'companyDelete'])->name('pagination.suIzleme.CompDelete');
    });
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});

// Index sayfası ve yönlendirme
Route::get('', [RoutingController::class, 'index'])->name('root');
