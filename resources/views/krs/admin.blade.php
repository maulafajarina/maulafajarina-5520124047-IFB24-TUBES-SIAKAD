@extends('adminlte::page')

@section('title', 'Data KRS Mahasiswa')

@section('content_header')
<div class="pb-2">
    <h1 class="mb-0 text-dark font-weight-bold" style="font-size: calc(1.5rem + 1vw);">
        <i class="fas fa-file-signature" style="color: #0b6851;"></i>
        Data KRS Mahasiswa
    </h1>
    <small class="text-muted">
        Monitoring Pengambilan Mata Kuliah Mahasiswa
    </small>
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

    /* Custom Border Card Outline */
    .card-outline-custom {
        border-top: 3px solid #0b6851 !important;
    }
</style>
@stop

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm">
    <i class="fas fa-check-circle mr-1"></i>
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif

<div class="card card-outline card-outline-custom shadow-sm border-0">

    <div class="card-header bg-white">
        <h5 class="mb-0 font-weight-bold text-secondary">
            <i class="fas fa-book-open mr-1" style="color: #0b6851;"></i>
            Daftar KRS Mahasiswa
        </h5>
    </div>

    <div class="card-body p-0 p-sm-3"> 
        <div class="table-responsive w-full" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">

            <table class="table table-bordered table-hover mb-0" style="min-width: 750px; width: 100%;">

                <thead style="background: #062e26; color: white;">
                    <tr>
                        <th class="text-center" width="60" style="border-color: #004d40;">No</th>
                        <th width="140" style="border-color: #004d40;">NPM</th>
                        <th style="border-color: #004d40;">Mahasiswa</th>
                        <th class="text-center" width="120" style="border-color: #004d40;">Kode MK</th>
                        <th style="border-color: #004d40;">Mata Kuliah</th>
                        <th class="text-center" width="110" style="border-color: #004d40;">SKS</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($krs as $key => $k)

                    <tr>
                        <td class="text-center align-middle">{{ $key + 1 }}</td>

                        <td class="align-middle">
                            <span class="badge text-white px-2 py-1" style="font-size: 90%; background-color: #0b6851;">
                                {{ $k->npm }}
                            </span>
                        </td>

                        <td class="align-middle font-weight-bold text-dark">
                            {{ $k->mahasiswa->nama ?? '-' }}
                        </td>

                        <td class="text-center align-middle font-weight-bold text-secondary">
                            {{ $k->kode_matakuliah }}
                        </td>

                        <td class="align-middle">
                            {{ $k->matakuliah->nama_matakuliah ?? '-' }}
                        </td>

                        <td class="text-center align-middle">
                            <span class="badge text-white px-2 py-1" style="font-size: 90%; background-color: #029e74;">
                                {{ $k->matakuliah->sks ?? 0 }} SKS
                            </span>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fas fa-info-circle fa-2x mb-3 text-gray"></i>
                            <br>
                            <strong>Belum ada data KRS</strong>
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<div class="row mt-3">

    <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card shadow-sm border-0 mb-0 h-100">
            <div class="card-body text-center d-flex flex-column justify-content-center py-4">
                <i class="fas fa-book fa-2x mb-2" style="color: #0b6851;"></i>
                <h2 class="font-weight-bold text-dark mb-1">
                    {{ $krs->count() }}
                </h2>
                <p class="text-muted mb-0 small uppercase font-weight-bold">
                    Total Pengambilan Mata Kuliah
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card shadow-sm border-0 mb-0 h-100">
            <div class="card-body text-center d-flex flex-column justify-content-center py-4">
                <i class="fas fa-graduation-cap fa-2x mb-2" style="color: #029e74;"></i>
                <h2 class="font-weight-bold text-dark mb-1">
                    {{ $krs->sum(fn($item) => $item->matakuliah->sks ?? 0) }}
                </h2>
                <p class="text-muted mb-0 small uppercase font-weight-bold">
                    Total SKS Diambil
                </p>
            </div>
        </div>
    </div>

</div>
@stop