@extends('adminlte::page')

@section('title', 'Edit Mahasiswa')

@section('content_header')
<h1>
    <i class="fas fa-user-edit text-primary"></i>
    Edit Mahasiswa
</h1>
@stop

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header" style="background:#1E293B;color:white;">
        <h3 class="card-title">
            Form Edit Mahasiswa
        </h3>
    </div>

    <form action="{{ route('mahasiswa.update', $mahasiswa->npm) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">

                <label>NPM</label>

                <input type="text"
                       name="npm"
                       class="form-control"
                       value="{{ $mahasiswa->npm }}"
                       required>

            </div>

            <div class="form-group">

                <label>Nama Mahasiswa</label>

                <input type="text"
                       name="nama"
                       class="form-control"
                       value="{{ $mahasiswa->nama }}"
                       required>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-success">

                <i class="fas fa-save"></i>
                Update

            </button>

            <a href="{{ route('mahasiswa.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

        </div>

    </form>

</div>

@stop