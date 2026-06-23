@extends('adminlte::page')

@section('title', 'Tambah Jadwal')

@section('content_header')
<div class="pb-2">
    <h1 class="mb-0 text-dark font-weight-bold" style="font-size: calc(1.5rem + 1vw);">
        <i class="fas fa-calendar-plus" style="color: #0b6851;"></i> 
        Tambah Jadwal
    </h1>
    <small class="text-muted">Tambah Alokasi Waktu Perkuliahan Baru</small>
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
    <h5 class="font-weight-bold"><i class="icon fas fa-ban mr-2"></i> Gagal Menyimpan Data!</h5>
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
            <i class="fas fa-edit mr-1"></i> Form Jadwal Kuliah
        </h3>
    </div>

    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="card-body py-4">

            <div class="form-group mb-4">
                <label for="kode_matakuliah" class="font-weight-bold text-secondary">Mata Kuliah</label>
                <select name="kode_matakuliah" id="kode_matakuliah" class="form-control @error('kode_matakuliah') is-invalid @enderror">
                    <option value="" disabled selected>-- Pilih Mata Kuliah --</option>
                    @foreach($matakuliah as $mk)
                        <option value="{{ $mk->kode_matakuliah }}" {{ old('kode_matakuliah') == $mk->kode_matakuliah ? 'selected' : '' }}>
                            [{{ $mk->kode_matakuliah }}] {{ $mk->nama_matakuliah }}
                        </option>
                    @endforeach
                </select>
                @error('kode_matakuliah')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="nidn" class="font-weight-bold text-secondary">Dosen Pengampu</label>
                <select name="nidn" id="nidn" class="form-control @error('nidn') is-invalid @enderror">
                    <option value="" disabled selected>-- Pilih Dosen --</option>
                    @foreach($dosen as $d)
                        <option value="{{ $d->nidn }}" {{ old('nidn') == $d->nidn ? 'selected' : '' }}>
                            [{{ $d->nidn }}] {{ $d->nama }}
                        </option>
                    @endforeach
                </select>
                @error('nidn')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="kelas" class="font-weight-bold text-secondary">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror" 
                       placeholder="Contoh: A" value="{{ old('kelas') }}">
                @error('kelas')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="hari" class="font-weight-bold text-secondary">Hari</label>
                <select name="hari" id="hari" class="form-control @error('hari') is-invalid @enderror">
                    <option value="" disabled selected>-- Pilih Hari --</option>
                    <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                    <option value="Sabtu" {{ old('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                </select>
                @error('hari')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jam" class="font-weight-bold text-secondary">Jam</label>
                <input type="time" name="jam" id="jam" class="form-control @error('jam') is-invalid @enderror" 
                       value="{{ old('jam') }}">
                @error('jam')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="card-footer bg-light border-top d-flex justify-content-start">
            <button type="submit" class="btn text-white shadow-sm font-weight-bold px-4 mr-2" style="background-color: #029e74;">
                <i class="fas fa-save mr-1"></i> Simpan
            </button>
            <a href="{{ route('jadwal.index') }}" class="btn btn-secondary shadow-sm font-weight-bold px-4">
                Kembali
            </a>
        </div>
    </form>

</div>
@stop