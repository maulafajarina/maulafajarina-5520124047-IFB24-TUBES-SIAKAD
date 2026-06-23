@extends('adminlte::page')

@section('title', 'Edit Dosen')

@section('content_header')
<h1><i class="fas fa-edit"></i> Edit Dosen</h1>
@stop

@section('content')

<div class="card card-warning">

    <div class="card-header">
        <h3 class="card-title">Form Edit Dosen</h3>
    </div>

    <form action="{{ route('dosen.update',$dosen->nidn) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label>NIDN</label>

                <input type="text"
                       class="form-control"
                       value="{{ $dosen->nidn }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Nama Dosen</label>

                <input type="text"
                       name="nama"
                       value="{{ $dosen->nama }}"
                       class="form-control">
            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-success">

                <i class="fas fa-save"></i>
                Update

            </button>

            <a href="{{ route('dosen.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>

@stop