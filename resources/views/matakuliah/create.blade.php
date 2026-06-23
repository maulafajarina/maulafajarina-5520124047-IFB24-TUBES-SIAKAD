@extends('adminlte::page')

@section('title', 'Tambah Mata Kuliah')

@section('content_header')
<div class="pb-2">
    <h1 class="mb-0 text-dark font-weight-bold" style="font-size: calc(1.5rem + 1vw);">
        <i class="fas fa-book-medical" style="color: #0b6851;"></i> 
        Tambah Mata Kuliah
    </h1>
    <small class="text-muted">Tambah Informasi Kurikulum Mata Kuliah Baru</small>
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
            <i class="fas fa-edit mr-1"></i> Form Input Mata Kuliah
        </h3>
    </div>

    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf
        <div class="card-body py-4">

            <div class="form-group mb-4">
                <label for="kode_matakuliah" class="font-weight-bold text-secondary">Kode Mata Kuliah</label>
                <input type="text"
                       name="kode_matakuliah"
                       id="kode_matakuliah"
                       class="form-control @error('kode_matakuliah') is-invalid @enderror"
                       placeholder="Contoh: IF101"
                       value="{{ old('kode_matakuliah') }}"
                       required>
                @error('kode_matakuliah')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="nama_matakuliah" class="font-weight-bold text-secondary">Nama Mata Kuliah</label>
                <input type="text"
                       name="nama_matakuliah"
                       id="nama_matakuliah"
                       class="form-control @error('nama_matakuliah') is-invalid @enderror"
                       placeholder="Contoh: Pemrograman Web"
                       value="{{ old('nama_matakuliah') }}"
                       required>
                @error('nama_matakuliah')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="sks" class="font-weight-bold text-secondary">SKS</label>
                <input type="number"
                       name="sks"
                       id="sks"
                       class="form-control @error('sks') is-invalid @enderror"
                       min="1"
                       max="6"
                       placeholder="Contoh: 3"
                       value="{{ old('sks') }}"
                       required>
                @error('sks')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="card-footer bg-light border-top d-flex justify-content-start">
            <button type="submit" class="btn text-white shadow-sm font-weight-bold px-4 mr-2" style="background-color: #029e74;">
                <i class="fas fa-save mr-1"></i> Simpan
            </button>
            
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary shadow-sm font-weight-bold px-4">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </form>

</div>
@stop