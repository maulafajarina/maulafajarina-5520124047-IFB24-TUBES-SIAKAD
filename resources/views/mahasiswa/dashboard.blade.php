@extends('adminlte::page')

@section('title', 'Dashboard Mahasiswa')

@section('content_header')
<div class="pb-2">
    <h1 class="mb-0 text-dark font-weight-bold" style="font-size: calc(1.5rem + 1vw);">
        <i class="fas fa-user-graduate" style="color: #0b6851;"></i>
        Dashboard Mahasiswa
    </h1>
    <small class="text-muted">Selamat Datang di Portal Akademik Mahasiswa</small>
</div>
@stop

@section('content')

@section('css')
<style>
    /* 1. Bagian Header Logo (TUBES-PWL) */
    .brand-link {
        background-color: #0b6851 !important;
        color: #ffffff !important;
    }

    /* 2. Badan Utama Sidebar */
    .main-sidebar {
        background-color: #062e26 !important;
    }
    .nav-sidebar .nav-link {
        color: #c2c7d0 !important;
    }
    .nav-sidebar .nav-link i {
        color: #c2c7d0 !important;
    }

    /* 3. Menu Aktif */
    .nav-sidebar .nav-link.active {
        background-color: #029e74 !important;
        color: #ffffff !important;
    }
    .nav-sidebar .nav-link.active i {
        color: #ffffff !important;
    }

    /* 4. Navbar Atas (Header Utama) */
    nav.main-header.navbar,
    .main-header.navbar-expand,
    .main-header {
        background-color: #004d40 !important;
        border-bottom: 1px solid #062e26 !important;
    }
    nav.main-header.navbar .nav-link,
    nav.main-header.navbar .nav-link i,
    nav.main-header.navbar .navbar-nav .nav-item a {
        color: #ffffff !important;
    }

    /* Style Custom Kotak Statistik Dashboard */
    .bg-custom-theme {
        background-color: #0b6851 !important;
        color: #ffffff !important;
    }
    .bg-custom-accent {
        background-color: #062e26 !important;
        color: #ffffff !important;
    }
    .bg-custom-light-green {
        background-color: #029e74 !important;
        color: #ffffff !important;
    }

    /* Custom Border Card Outline Form */
    .card-outline-custom {
        border-top: 3px solid #0b6851 !important;
    }
</style>
@stop

<div class="row">

    <div class="col-md-4 col-sm-6 col-12">
        <div class="small-box bg-custom-theme shadow-sm border-0">
            <div class="inner">
                <h3>{{ \App\Models\Krs::where('npm', auth()->user()->npm)->count() }}</h3>
                <p class="font-weight-bold">Total Mata Kuliah</p>
            </div>
            <div class="icon">
                <i class="fas fa-book" style="color: rgba(255,255,255,0.15);"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
        <div class="small-box bg-custom-light-green shadow-sm border-0">
            <div class="inner">
                <h3>{{ \App\Models\Matakuliah::sum('sks') }}</h3>
                <p class="font-weight-bold">Total SKS</p>
            </div>
            <div class="icon">
                <i class="fas fa-calculator" style="color: rgba(255,255,255,0.15);"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-12 col-12">
        <div class="small-box bg-custom-accent shadow-sm border-0">
            <div class="inner">
                <h3>{{ \App\Models\Jadwal::count() }}</h3>
                <p class="font-weight-bold">Total Jadwal</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar" style="color: rgba(255,255,255,0.15);"></i>
            </div>
        </div>
    </div>

</div>

<div class="card card-outline card-outline-custom shadow-sm border-0">

    <div class="card-header text-white" style="background-color: #062e26;">
        <h3 class="card-title font-weight-bold mb-0">
            <i class="fas fa-id-card mr-1"></i> Profil Mahasiswa
        </h3>
    </div>

    <div class="card-body py-4">
        <div class="row">
            <div class="col-md-6">
                <p class="mb-2"><b class="text-secondary">Nama Lengkap :</b></p>
                <h5 class="text-dark font-weight-bold mb-4">{{ auth()->user()->name }}</h5>
            </div>
            <div class="col-md-6">
                <p class="mb-2"><b class="text-secondary">Alamat Email :</b></p>
                <h5 class="text-dark font-weight-bold mb-4">{{ auth()->user()->email }}</h5>
            </div>
        </div>
    </div>

</div>

@stop