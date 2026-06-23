@if(auth()->user()->role == 'mahasiswa')

@extends('adminlte::page')

@section('title', 'Dashboard Mahasiswa')

@section('content_header')

<h1>
    <i class="fas fa-user-graduate"></i>
    Dashboard Mahasiswa
</h1>
@stop

@section('content')

<div class="row">


<div class="col-md-4">
    <div class="small-box bg-info">
        <div class="inner">
            <h3>{{ \App\Models\Krs::count() }}</h3>
            <p>Total Mata Kuliah</p>
        </div>
        <div class="icon">
            <i class="fas fa-book"></i>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{ \App\Models\Matakuliah::sum('sks') }}</h3>
            <p>Total SKS</p>
        </div>
        <div class="icon">
            <i class="fas fa-calculator"></i>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3>{{ \App\Models\Jadwal::count() }}</h3>
            <p>Total Jadwal</p>
        </div>
        <div class="icon">
            <i class="fas fa-calendar"></i>
        </div>
    </div>
</div>


</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Profil Mahasiswa
        </h3>
    </div>


<div class="card-body">

    <p><b>Nama :</b> {{ auth()->user()->name }}</p>

    <p><b>Email :</b> {{ auth()->user()->email }}</p>

    <p><b>Role :</b> Mahasiswa</p>

</div>


</div>

@stop

@else

<h1>Dashboard Admin</h1>

@endif
