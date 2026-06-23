@extends('adminlte::page')

@section('title', 'Tambah KRS')

@section('content_header')
<div class="pb-2">
    <h1 class="mb-0 text-dark font-weight-bold" style="font-size: calc(1.5rem + 1vw);">
        <i class="fas fa-graduation-cap" style="color: #0b6851;"></i> 
        Tambah KRS
    </h1>
    <small class="text-muted">Ambil Rencana Mata Kuliah Baru Semester Ini</small>
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

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show shadow-sm">
    <h5 class="font-weight-bold"><i class="icon fas fa-ban mr-2"></i> Gagal Mengambil Mata Kuliah!</h5>
    <ul class="mb-0 pl-4">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif

<div class="card card-outline card-outline-custom shadow-sm border-0">

    <div class="card-header text-white" style="background-color: #062e26;">
        <h3 class="card-title font-weight-bold mb-0">
            <i class="fas fa-edit mr-1"></i> Form Pemilihan Mata Kuliah
        </h3>
    </div>

    <form action="{{ route('krs.store') }}" method="POST">
        @csrf
        <div class="card-body py-4">

            <div class="form-group mb-4">
                <label for="npm_display" class="font-weight-bold text-secondary">Nomor Pokok Mahasiswa (NPM)</label>
                <input type="text" id="npm_display" class="form-control bg-light font-weight-bold" 
                       value="{{ auth()->user()->npm }}" readonly style="letter-spacing: 1px;">
                <input type="hidden" name="npm" value="{{ auth()->user()->npm }}">
            </div>

            <div class="form-group mb-3">
                <label for="kode_matakuliah" class="font-weight-bold text-secondary">Mata Kuliah</label>
                <select name="kode_matakuliah" id="kode_matakuliah" class="form-control @error('kode_matakuliah') is-invalid @enderror">
                    <option value="" disabled selected>-- Pilih Mata Kuliah yang Diambil --</option>
                    @foreach($matakuliah as $mk)
                        <option value="{{ $mk->kode_matakuliah }}" {{ old('kode_matakuliah') == $mk->kode_matakuliah ? 'selected' : '' }}>
                            [{{ $mk->kode_matakuliah }}] {{ $mk->nama_matakuliah }} ({{ $mk->sks }} SKS)
                        </option>
                    @endforeach
                </select>
                @error('kode_matakuliah')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="card-footer bg-light border-top d-flex justify-content-start">
            <button type="submit" class="btn text-white shadow-sm font-weight-bold px-4 mr-2" style="background-color: #029e74;">
                <i class="fas fa-save mr-1"></i> Simpan KRS
            </button>
            <a href="{{ route('krs.index') }}" class="btn btn-secondary shadow-sm font-weight-bold px-4">
                Kembali
            </a>
        </div>
    </form>

</div>
@stop