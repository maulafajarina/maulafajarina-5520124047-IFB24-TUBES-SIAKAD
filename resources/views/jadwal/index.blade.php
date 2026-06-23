@extends('adminlte::page')

@section('title', 'Data Jadwal')

@section('content_header')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center pb-3 pb-sm-0">
    <div class="mb-3 mb-sm-0">
        <h1 class="mb-0 text-dark font-weight-bold" style="font-size: calc(1.5rem + 1vw);">
            <i class="fas fa-calendar-alt" style="color: #0b6851;"></i> 
            Data Jadwal
        </h1>
        <small class="text-muted">Kelola Alokasi Waktu Perkuliahan</small>
    </div>

    <div class="w-100 w-sm-auto">
        <a href="{{ route('jadwal.create') }}" class="btn text-white shadow-sm btn-block d-sm-inline-block" style="background-color: #029e74;">
            <i class="fas fa-plus-circle"></i> Tambah Jadwal
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
        <h3 class="card-title font-weight-bold text-secondary mb-0">
            <i class="fas fa-list-alt mr-1" style="color: #0b6851;"></i>
            Daftar Jadwal Perkuliahan
        </h3>
    </div>

    <div class="card-body p-0 p-sm-3">

        <div class="table-responsive w-full" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">

            <table class="table table-bordered table-hover mb-0" style="min-width: 800px; width: 100%;">

                <thead style="background: #062e26; color: white;">
                    <tr>
                        <th class="text-center" width="60" style="border-color: #004d40;">No</th>
                        <th style="border-color: #004d40;">Mata Kuliah</th>
                        <th style="border-color: #004d40;">Dosen</th>
                        <th class="text-center" width="90" style="border-color: #004d40;">Kelas</th>
                        <th class="text-center" width="120" style="border-color: #004d40;">Hari</th>
                        <th class="text-center" width="110" style="border-color: #004d40;">Jam</th>
                        <th class="text-center" width="150" style="border-color: #004d40;">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($jadwal as $key => $j)

                    <tr>
                        <td class="text-center align-middle">{{ $key + 1 }}</td>

                        <td class="align-middle text-dark font-weight-bold">
                            {{ $j->matakuliah->nama_matakuliah ?? '-' }}
                        </td>

                        <td class="align-middle">
                            {{ $j->dosen->nama ?? '-' }}
                        </td>

                        <td class="text-center align-middle">
                            <span class="badge text-white px-2 py-1" style="background-color: #029e74;">
                                {{ $j->kelas }}
                            </span>
                        </td>

                        <td class="text-center align-middle">
                            <span class="badge text-white px-2 py-1" style="background-color: #0b6851;">
                                {{ $j->hari }}
                            </span>
                        </td>

                        <td class="text-center align-middle font-weight-bold text-secondary">
                            <i class="far fa-clock mr-1 text-muted small"></i>{{ substr($j->jam,0,5) }}
                        </td>

                        <td class="text-center align-middle">
                            <div class="btn-group" role="group">
                                <a href="{{ route('jadwal.show',$j->id) }}"
                                   class="btn btn-outline-info btn-sm mx-1 rounded shadow-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('jadwal.edit',$j->id) }}"
                                   class="btn btn-outline-warning btn-sm mx-1 rounded shadow-sm" title="Ubah">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('jadwal.destroy',$j->id) }}"
                                      method="POST"
                                      style="display:inline">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Yakin hapus data?')"
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
                            <i class="fas fa-calendar-times fa-2x mb-3 text-gray"></i>
                            <br>
                            <strong>Belum ada data jadwal</strong>
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@stop