@extends('adminlte::page')

@section('title', 'KRS Mahasiswa')

@section('content_header')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center justify-content-sm-between pb-3 pb-sm-0">
    <div class="mb-3 mb-sm-0">
        <h1 class="mb-0 text-dark font-weight-bold" style="font-size: calc(1.5rem + 1vw);">
            <i class="fas fa-graduation-cap" style="color: #0b6851;"></i>
            Kartu Rencana Studi
        </h1>
        <small class="text-muted">
            Sistem Informasi Akademik Mahasiswa
        </small>
    </div>

    <div class="d-flex flex-wrap w-100 w-sm-auto" style="gap: 8px;">
        <a href="{{ route('krs.print') }}"
           class="btn text-white shadow-sm flex-fill flex-sm-grow-0" style="background-color: #029e74;">
            <i class="fas fa-file-pdf mr-1"></i> Cetak PDF
        </a>

        <a href="{{ route('krs.create') }}"
           class="btn text-white shadow-sm flex-fill flex-sm-grow-0" style="background-color: #0b6851;">
            <i class="fas fa-plus-circle mr-1"></i> Ambil Mata Kuliah
        </a>
    </div>
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
    
    /* Custom Styling Action Table Buttons */
    .btn-outline-custom-green {
        color: #0b6851;
        border-color: #0b6851;
    }
    .btn-outline-custom-green:hover {
        background-color: #0b6851;
        color: #ffffff;
    }
</style>
@stop

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm border-0" style="background-color: #029e74; color: white;">
    <i class="icon fas fa-check mr-2"></i> {{ session('success') }}
    <button type="button" class="close text-white" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif

<div class="card card-outline card-outline-custom shadow-sm border-0">

    <div class="card-header text-white" style="background-color: #062e26;">
        <h5 class="mb-0 font-weight-bold card-title">
            <i class="fas fa-book-open mr-1"></i> Data Pengambilan Mata Kuliah
        </h5>
    </div>

    <div class="card-body p-0 p-sm-3"> 
        <div class="table-responsive w-full" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
            <table class="table table-hover mb-0" style="min-width: 800px; width: 100%;">
                <thead style="background:#062e26; color:white;">
                    <tr>
                        <th class="border-0 text-center" width="60">No</th>
                        <th class="border-0">NPM</th>
                        <th class="border-0">Mahasiswa</th>
                        <th class="border-0">Kode MK</th>
                        <th class="border-0">Mata Kuliah</th>
                        <th class="border-0 text-center">SKS</th>
                        <th class="border-0 text-center" width="170">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($krs as $key => $k)
                    <tr>
                        <td class="text-center align-middle">{{ $key + 1 }}</td>

                        <td class="align-middle">
                            <span class="badge text-white px-2 py-1" style="background-color: #0b6851;">
                                {{ $k->npm }}
                            </span>
                        </td>

                        <td class="align-middle font-weight-bold text-dark">
                            {{ $k->mahasiswa->nama ?? '-' }}
                        </td>

                        <td class="align-middle font-weight-bold text-secondary">{{ $k->kode_matakuliah }}</td>

                        <td class="align-middle text-wrap" style="max-width: 200px;">
                            {{ $k->matakuliah->nama_matakuliah ?? '-' }}
                        </td>

                        <td class="text-center align-middle">
                            <span class="badge text-white px-2 py-1" style="background-color: #029e74;">
                                {{ $k->matakuliah->sks ?? 0 }} SKS
                            </span>
                        </td>

                        <td class="text-center align-middle">
                            <div class="btn-group" role="group">
                                <a href="{{ route('krs.show',$k->id) }}"
                                   class="btn btn-outline-custom-green btn-sm mx-1 rounded shadow-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('krs.edit',$k->id) }}"
                                   class="btn btn-outline-secondary btn-sm mx-1 rounded shadow-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('krs.destroy',$k->id) }}"
                                      method="POST"
                                      style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus KRS?')"
                                            class="btn btn-outline-danger btn-sm mx-1 rounded shadow-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fas fa-info-circle fa-2x mb-3" style="color: #0b6851;"></i>
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
        <div class="card shadow-sm border-0 mb-0 h-100 card-outline card-outline-custom">
            <div class="card-body text-center d-flex flex-column justify-content-center py-4">
                <i class="fas fa-book fa-2x mb-2" style="color: #0b6851;"></i>
                <h2 class="font-weight-bold text-dark mb-1">
                    {{ $krs->count() }}
                </h2>
                <p class="text-muted mb-0 small uppercase font-weight-bold">
                    Mata Kuliah Diambil
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card shadow-sm border-0 mb-0 h-100 card-outline card-outline-custom">
            <div class="card-body text-center d-flex flex-column justify-content-center py-4">
                <i class="fas fa-calculator fa-2x mb-2" style="color: #029e74;"></i>
                <h2 class="font-weight-bold text-dark mb-1">
                    {{ $krs->sum(fn($item) => $item->matakuliah->sks ?? 0) }}
                </h2>
                <p class="text-muted mb-0 small uppercase font-weight-bold">
                    Total SKS
                </p>
            </div>
        </div>
    </div>
</div>
@stop