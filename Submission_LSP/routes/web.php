<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\AccountController as AdminAccount;
use App\Http\Controllers\Admin\PemeriksaanController as AdminPemeriksaan;
use App\Http\Controllers\Admin\PaymentController as AdminPayment;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncement;

use App\Http\Controllers\Pasien\DashboardController as PasienDashboard;
use App\Http\Controllers\Pasien\PemeriksaanController as PasienPemeriksaan;
use App\Http\Controllers\Pasien\PaymentController as PasienPayment;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        
        Route::get('/accounts', [AdminAccount::class, 'index'])->name('accounts.index');
        Route::post('/accounts/{id}/verify', [AdminAccount::class, 'verify'])->name('accounts.verify');

        Route::get('/pemeriksaan', [AdminPemeriksaan::class, 'index'])->name('pemeriksaan.index');
        Route::post('/pemeriksaan/{id}/verify', [AdminPemeriksaan::class, 'verify'])->name('pemeriksaan.verify');

        Route::get('/payments', [AdminPayment::class, 'index'])->name('payments.index');
        Route::post('/payments/{id}/verify', [AdminPayment::class, 'verify'])->name('payments.verify');

        Route::resource('announcements', AdminAnnouncement::class);
    });

    // Pasien Routes
    Route::middleware('role:pasien')->prefix('pasien')->name('pasien.')->group(function () {
        Route::get('/dashboard', [PasienDashboard::class, 'index'])->name('dashboard');
        
        Route::get('/pemeriksaan', [PasienPemeriksaan::class, 'index'])->name('pemeriksaan.index');
        Route::post('/pemeriksaan', [PasienPemeriksaan::class, 'store'])->name('pemeriksaan.store');
        
        Route::get('/pemeriksaan/{id}/payment', [PasienPayment::class, 'create'])->name('payments.create');
        Route::post('/pemeriksaan/{id}/payment', [PasienPayment::class, 'store'])->name('payments.store');
    });
});
