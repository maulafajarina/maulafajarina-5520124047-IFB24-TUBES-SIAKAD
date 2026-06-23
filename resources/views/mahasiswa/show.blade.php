@extends('adminlte::page')

@section('title', 'Detail Mahasiswa')

@section('content_header')
<h1>
    <i class="fas fa-user-graduate text-primary"></i>
    Detail Mahasiswa
</h1>
@stop

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-primary">
        <h3 class="card-title text-white">
            Informasi Mahasiswa
        </h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">NPM</th>
                <td>{{ $mahasiswa->npm }}</td>
            </tr>

            <tr>
                <th>Nama Mahasiswa</th>
                <td>{{ $mahasiswa->nama }}</td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{{ $mahasiswa->created_at }}</td>
            </tr>

        </table>

    </div>

    <div class="card-footer">

        <a href="{{ route('mahasiswa.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Kembali

        </a>

    </div>

</div>

@stop