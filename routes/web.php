<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Welcome Page (Rute Utama Aplikasi)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome'); // Halaman Welcome asli Laravel sekarang aman di sini
});

Route::get('/logout-user', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout.user');

Route::get('/krs/print', [KrsController::class, 'print'])
    ->name('krs.print');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    // Menggunakan strtolower agar aman dari sensitivitas huruf besar/kecil database
    if (strtolower(auth()->user()->role) == 'admin') {
        return view('admin.dashboard');
    }

    return view('mahasiswa.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Auth User
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | ADMIN 
    |--------------------------------------------------------------------------
    */
    Route::middleware(['can:admin'])->group(function () {

        Route::resource('dosen', DosenController::class);

        Route::resource('mahasiswa', MahasiswaController::class);

        Route::resource('matakuliah', MatakuliahController::class);

        Route::resource('jadwal', JadwalController::class);

        Route::get('/admin-krs', [KrsController::class, 'adminIndex'])
            ->name('krs.admin');
    });

    /*
    |--------------------------------------------------------------------------
    | MAHASISWA
    |--------------------------------------------------------------------------
    */
    Route::middleware(['can:mahasiswa'])->group(function () {

        Route::resource('krs', KrsController::class);

        Route::get('/jadwal-mahasiswa',
            [JadwalController::class, 'jadwalMahasiswa'])
            ->name('jadwal.mahasiswa');

    });

});

require __DIR__.'/auth.php';