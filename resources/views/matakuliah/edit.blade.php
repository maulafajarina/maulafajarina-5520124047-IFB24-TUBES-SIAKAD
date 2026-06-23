@extends('adminlte::page')

@section('title', 'Edit Mata Kuliah')

@section('content_header')
<h1>
    <i class="fas fa-edit text-primary"></i>
    Edit Mata Kuliah
</h1>
@stop

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header" style="background:#1E293B;color:white;">
        <h3 class="card-title">
            Form Edit Mata Kuliah
        </h3>
    </div>

    <form action="{{ route('matakuliah.update', $matakuliah->kode_matakuliah) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">

                <label>Kode Mata Kuliah</label>

                <input type="text"
                       name="kode_matakuliah"
                       class="form-control"
                       value="{{ $matakuliah->kode_matakuliah }}"
                       required>

            </div>

            <div class="form-group">

                <label>Nama Mata Kuliah</label>

                <input type="text"
                       name="nama_matakuliah"
                       class="form-control"
                       value="{{ $matakuliah->nama_matakuliah }}"
                       required>

            </div>

            <div class="form-group">

                <label>SKS</label>

                <input type="number"
                       name="sks"
                       class="form-control"
                       min="1"
                       max="6"
                       value="{{ $matakuliah->sks }}"
                       required>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-success">

                <i class="fas fa-save"></i>
                Update

            </button>

            <a href="{{ route('matakuliah.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

        </div>

    </form>

</div>

@stop