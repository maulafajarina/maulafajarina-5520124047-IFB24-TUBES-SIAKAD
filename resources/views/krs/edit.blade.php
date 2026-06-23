@extends('adminlte::page')

@section('title', 'Edit KRS')

@section('content')

<div class="card">

    <form action="{{ route('krs.update',$krs->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">

                <label>Mahasiswa</label>

                <select name="npm" class="form-control">

                    @foreach($mahasiswa as $m)

                        <option value="{{ $m->npm }}"
                            {{ $krs->npm == $m->npm ? 'selected' : '' }}>

                            {{ $m->npm }} - {{ $m->nama }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Mata Kuliah</label>

                <select name="kode_matakuliah" class="form-control">

                    @foreach($matakuliah as $mk)

                        <option value="{{ $mk->kode_matakuliah }}"
                            {{ $krs->kode_matakuliah == $mk->kode_matakuliah ? 'selected' : '' }}>

                            {{ $mk->kode_matakuliah }} -
                            {{ $mk->nama_matakuliah }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-success">
                Update
            </button>

        </div>

    </form>

</div>

@stop