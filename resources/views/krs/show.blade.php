@extends('adminlte::page')

@section('title', 'Detail KRS')

@section('content')

<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th>NPM</th>
                <td>{{ $krs->npm }}</td>
            </tr>

            <tr>
                <th>Kode Mata Kuliah</th>
                <td>{{ $krs->kode_matakuliah }}</td>
            </tr>

        </table>

    </div>

</div>

@stop