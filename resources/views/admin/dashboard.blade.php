@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
<div class="pb-2">
    <h1 class="mb-0 text-dark font-weight-bold" style="font-size: calc(1.5rem + 1vw);">
        <i class="fas fa-tachometer-alt" style="color: #0b6851;"></i>
        Dashboard Admin
    </h1>
    <small class="text-muted">Ringkasan Data dan Statistik Sistem Akademik</small>
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

    /* Style Custom untuk Kotak Statistik (Small Box Dashboard) */
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
    .bg-custom-theme-light {
        background-color: #ffffff !important;
        color: #333333 !important;
        border: 2px solid #0b6851;
    }
</style>
@stop

<div class="row">

    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-custom-theme shadow-sm border-0">
            <div class="inner">
                <h3>{{ \App\Models\Dosen::count() }}</h3>
                <p class="font-weight-bold">Total Dosen</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie" style="color: rgba(255,255,255,0.15);"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-custom-light-green shadow-sm border-0">
            <div class="inner">
                <h3>{{ \App\Models\Mahasiswa::count() }}</h3>
                <p class="font-weight-bold">Total Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="fas fa-users" style="color: rgba(255,255,255,0.15);"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-custom-accent shadow-sm border-0">
            <div class="inner">
                <h3>{{ \App\Models\Matakuliah::count() }}</h3>
                <p class="font-weight-bold">Total Mata Kuliah</p>
            </div>
            <div class="icon">
                <i class="fas fa-book" style="color: rgba(255,255,255,0.15);"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-custom-theme-light shadow-sm">
            <div class="inner">
                <h3 style="color: #0b6851;">{{ \App\Models\Jadwal::count() }}</h3>
                <p class="text-secondary font-weight-bold">Total Jadwal</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-alt" style="color: rgba(11, 104, 81, 0.15);"></i>
            </div>
        </div>
    </div>

</div>

@stop