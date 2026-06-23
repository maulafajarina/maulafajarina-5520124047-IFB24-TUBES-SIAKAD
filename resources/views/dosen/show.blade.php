@extends('adminlte::page')

@section('title', 'Detail Dosen')

@section('content_header')
<h1><i class="fas fa-user"></i> Detail Dosen</h1>
@stop

@section('content')

<div class="card card-info">

    <div class="card-header">
        <h3 class="card-title">Informasi Dosen</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">NIDN</th>
                <td>{{ $dosen->nidn }}</td>
            </tr>

            <tr>
                <th>Nama Dosen</th>
                <td>{{ $dosen->nama }}</td>
            </tr>

        </table>

    </div>

    <div class="card-footer">
        <a href="{{ route('dosen.index') }}"
           class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
    </div>

</div>

@stop