@extends('adminlte::page')

@section('title', 'Edit Jadwal')

@section('content_header')
<h1>
    <i class="fas fa-calendar-alt text-primary"></i>
    Edit Jadwal Kuliah
</h1>
@stop

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header" style="background:#1E293B;color:white;">
        <h3 class="card-title">
            Form Edit Jadwal Kuliah
        </h3>
    </div>

    <form action="{{ route('jadwal.update', $jadwal->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">

                <label>Mata Kuliah</label>

                <select name="kode_matakuliah" class="form-control">

                    @foreach($matakuliah as $mk)

                        <option value="{{ $mk->kode_matakuliah }}"
                            {{ $jadwal->kode_matakuliah == $mk->kode_matakuliah ? 'selected' : '' }}>

                            {{ $mk->kode_matakuliah }} -
                            {{ $mk->nama_matakuliah }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Dosen</label>

                <select name="nidn" class="form-control">

                    @foreach($dosen as $d)

                        <option value="{{ $d->nidn }}"
                            {{ $jadwal->nidn == $d->nidn ? 'selected' : '' }}>

                            {{ $d->nama }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Kelas</label>

                <input type="text"
                       name="kelas"
                       class="form-control"
                       value="{{ $jadwal->kelas }}"
                       required>

            </div>

            <div class="form-group">

                <label>Hari</label>

                <select name="hari" class="form-control">

                    <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                    <option value="Sabtu" {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>

                </select>

            </div>

            <div class="form-group">

                <label>Jam</label>

                <input type="time"
                       name="jam"
                       class="form-control"
                       value="{{ $jadwal->jam }}"
                       required>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-success">

                <i class="fas fa-save"></i>
                Update

            </button>

            <a href="{{ route('jadwal.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

        </div>

    </form>

</div>

@stop