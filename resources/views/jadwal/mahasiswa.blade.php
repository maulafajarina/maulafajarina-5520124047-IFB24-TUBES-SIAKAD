@extends('adminlte::page')

@section('title', 'Jadwal Kuliah')

@section('content_header')
<div class="pb-2">
    <h1 class="mb-0 text-dark font-weight-bold" style="font-size: calc(1.5rem + 1vw);">
        <i class="fas fa-calendar-alt" style="color: #0b6851;"></i>
        Jadwal Kuliah
    </h1>
    <small class="text-muted">Sistem Informasi Akademik Mahasiswa</small>
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
            <i class="fas fa-clock text-white mr-1"></i>
            Jadwal Perkuliahan
        </h3>
    </div>

    <div class="card-body p-0 p-sm-3"> 
        <div class="table-responsive w-full" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">

            <table class="table table-bordered table-hover mb-0" style="min-width: 750px; width: 100%;">

                <thead style="background:#062e26; color:white;">
                    <tr>
                        <th class="text-center" width="60" style="border-color: #0b6851;">No</th>
                        <th style="border-color: #0b6851;">Mata Kuliah</th>
                        <th class="text-center" width="100" style="border-color: #0b6851;">SKS</th>
                        <th style="border-color: #0b6851;">Dosen</th>
                        <th class="text-center" width="100" style="border-color: #0b6851;">Kelas</th>
                        <th class="text-center" width="130" style="border-color: #0b6851;">Hari</th>
                        <th class="text-center" width="110" style="border-color: #0b6851;">Jam</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($jadwal as $key => $j)

                    <tr>
                        <td class="text-center align-middle">{{ $key + 1 }}</td>

                        <td class="align-middle font-weight-bold text-dark">
                            {{ $j->matakuliah->nama_matakuliah ?? '-' }}
                        </td>

                        <td class="text-center align-middle">
                            <span class="badge text-white px-2 py-1" style="background-color: #029e74;">
                                {{ $j->matakuliah->sks ?? 0 }} SKS
                            </span>
                        </td>

                        <td class="align-middle font-weight-bold text-secondary">
                            {{ $j->dosen->nama ?? '-' }}
                        </td>

                        <td class="text-center align-middle">
                            <span class="badge text-white px-2 py-1" style="background-color: #0b6851;">
                                {{ $j->kelas }}
                            </span>
                        </td>

                        <td class="text-center align-middle">
                            <span class="badge text-white px-2 py-1" style="background-color: #004d40;">
                                {{ $j->hari }}
                            </span>
                        </td>

                        <td class="text-center align-middle font-weight-bold text-dark">
                            <i class="far fa-clock mr-1 text-muted small"></i>{{ substr($j->jam,0,5) }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fas fa-calendar-times fa-2x mb-3" style="color: #0b6851;"></i>
                            <br>
                            <strong>Belum ada jadwal perkuliahan</strong>
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@stop