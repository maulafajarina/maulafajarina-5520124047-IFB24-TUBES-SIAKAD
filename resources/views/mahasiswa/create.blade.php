@extends('adminlte::page')

@section('title', 'Tambah Mahasiswa')

@section('content_header')
<div class="pb-2">
    <h1 class="mb-0 text-dark font-weight-bold" style="font-size: calc(1.5rem + 1vw);">
        <i class="fas fa-user-plus" style="color: #0b6851;"></i> 
        Tambah Mahasiswa
    </h1>
    <small class="text-muted">Tambah Data Registrasi Mahasiswa Baru</small>
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

    /* Custom Border Card Outline Form */
    .card-outline-custom {
        border-top: 3px solid #0b6851 !important;
    }
</style>
@stop

<div class="card card-outline card-outline-custom shadow-sm border-0">

    <div class="card-header text-white" style="background-color: #062e26;">
        <h3 class="card-title font-weight-bold mb-0">
            <i class="fas fa-edit mr-1"></i> Form Input Data Mahasiswa
        </h3>
    </div>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <div class="card-body py-4">

            <div class="form-group mb-4">
                <label for="npm" class="font-weight-bold text-secondary">NPM (Nomor Pokok Mahasiswa)</label>
                <input type="text"
                       name="npm"
                       id="npm"
                       class="form-control @error('npm') is-invalid @enderror"
                       placeholder="Contoh: 21100101"
                       value="{{ old('npm') }}"
                       required>
                @error('npm')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="nama" class="font-weight-bold text-secondary">Nama Lengkap Mahasiswa</label>
                <input type="text"
                       name="nama"
                       id="nama"
                       class="form-control @error('nama') is-invalid @enderror"
                       placeholder="Contoh: Ahmad Subagja"
                       value="{{ old('nama') }}"
                       required>
                @error('nama')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="card-footer bg-light border-top d-flex justify-content-start">
            <button type="submit" class="btn text-white shadow-sm font-weight-bold px-4 mr-2" style="background-color: #029e74;">
                <i class="fas fa-save mr-1"></i> Simpan
            </button>
            
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary shadow-sm font-weight-bold px-4">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </form>

</div>
@stop