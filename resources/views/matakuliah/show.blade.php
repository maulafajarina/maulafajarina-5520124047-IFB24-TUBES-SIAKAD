@extends('adminlte::page')

@section('title', 'Detail Mata Kuliah')

@section('content_header')
<h1>
    <i class="fas fa-book text-primary"></i>
    Detail Mata Kuliah
</h1>
@stop

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-primary">
        <h3 class="card-title text-white">
            Informasi Mata Kuliah
        </h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">Kode Mata Kuliah</th>
                <td>{{ $matakuliah->kode_matakuliah }}</td>
            </tr>

            <tr>
                <th>Nama Mata Kuliah</th>
                <td>{{ $matakuliah->nama_matakuliah }}</td>
            </tr>

            <tr>
                <th>SKS</th>
                <td>{{ $matakuliah->sks }}</td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{{ $matakuliah->created_at }}</td>
            </tr>

        </table>

    </div>

    <div class="card-footer">

        <a href="{{ route('matakuliah.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Kembali

        </a>

    </div>

</div>

@stop