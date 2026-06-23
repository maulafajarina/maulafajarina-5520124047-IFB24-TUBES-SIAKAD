<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate; // 1. Wajib tambahkan ini untuk mengaktifkan Gate

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Memaksa HTTPS di lingkungan production (Railway)
        if (config('app.env') === 'production' || env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        // Gate untuk Admin (Abaikan huruf besar/kecil)
        Gate::define('admin', function ($user) {
            return strtolower($user->role) === 'admin';
        });

        // TAMBAHKAN KODE INI: Gate untuk Mahasiswa (Abaikan huruf besar/kecil)
        Gate::define('mahasiswa', function ($user) {
            return strtolower($user->role) === 'mahasiswa';
        });
    }
}