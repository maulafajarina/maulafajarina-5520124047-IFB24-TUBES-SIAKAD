@extends('adminlte::page')

@section('title', 'Detail Jadwal')

@section('content_header')
<h1>
    <i class="fas fa-calendar-alt text-primary"></i>
    Detail Jadwal Kuliah
</h1>
@stop

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-primary">
        <h3 class="card-title text-white">
            Informasi Jadwal Kuliah
        </h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">Mata Kuliah</th>
                <td>
                    {{ $jadwal->matakuliah->nama_matakuliah ?? '-' }}
                </td>
            </tr>

            <tr>
                <th>Kode Mata Kuliah</th>
                <td>
                    {{ $jadwal->kode_matakuliah }}
                </td>
            </tr>

            <tr>
                <th>Dosen</th>
                <td>
                    {{ $jadwal->dosen->nama ?? '-' }}
                </td>
            </tr>

            <tr>
                <th>NIDN</th>
                <td>
                    {{ $jadwal->nidn }}
                </td>
            </tr>

            <tr>
                <th>Kelas</th>
                <td>
                    {{ $jadwal->kelas }}
                </td>
            </tr>

            <tr>
                <th>Hari</th>
                <td>
                    {{ $jadwal->hari }}
                </td>
            </tr>

            <tr>
                <th>Jam</th>
                <td>
                    {{ $jadwal->jam }}
                </td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>
                    {{ $jadwal->created_at }}
                </td>
            </tr>

        </table>

    </div>

    <div class="card-footer">

        <a href="{{ route('jadwal.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Kembali

        </a>

    </div>

</div>

@stop