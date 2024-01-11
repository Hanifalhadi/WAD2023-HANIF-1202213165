<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\CivitasController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ResponController;
use App\Http\Controllers\User\UserController;
use App\Models\Response;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [UserController::class, 'index'])->name('pekat.index');

Route::middleware(['isCivitas'])->group(function () {
    Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('pekat.laporan');
    Route::get('/logout', [UserController::class, 'logout'])->name('pekat.logout');
    Route::post('/store', [UserController::class, 'storeReport'])->name('pekat.store');
});

Route::middleware(['guest'])->group(function () {
    // Login
    Route::post('/login/auth', [UserController::class, 'login'])->name('pekat.login');
    // Register
    Route::get('/register', [UserController::class, 'formRegister'])->name('pekat.formRegister');
    Route::post('/register/auth', [UserController::class, 'register'])->name('pekat.register');
    
});

Route::prefix('admin')->group(function(){

        Route::middleware(['isAdmin'])->group(function (){
        // petugas
        Route::resource('petugas', PetugasController::class);
        //  civitas
        Route::resource('civitas', CivitasController::class);
        // laporan
        Route::get('laporan',[LaporanController::class, 'index'])->name('laporan.index');
        Route::post('getLaporan',[LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
        Route::get('laporan/cetak/{from}/{to}', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');
        });
    
        Route::middleware(['isPetugas',])->group(function () {
        // dashboard
         Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        // report
        Route::resource('report', ReportController::class);

        // Response
          Route::post('response/createOrUpdate', [ResponController::class, 'createOrUpdate'])->name('response.createOrUpdate');

        // Logout
          Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        });

        Route::middleware(['isGuest'])->group(function () {
            Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
            Route::post('/login', [AdminController::class,'login'])->name('admin.login'); 
        });
  
  

});
