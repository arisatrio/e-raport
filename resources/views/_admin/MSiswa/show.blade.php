@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Manajemen Kelas
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.siswa.index') }}">Manajemen Siswa</a></li>
            <li class="breadcrumb-item">Detail Siswa</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Detail Siswa</h4>
    @endslot

    @slot('content')
        @include('layouts._alert')
        <div class="form-group row">
            <label for="email1" class="col-sm-4 control-label col-form-label">Nama</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" disabled value="{{ $murid->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="email1" class="col-sm-4 control-label col-form-label">NIP</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" disabled value="{{ $murid->username }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="email1" class="col-sm-4 control-label col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" disabled value="{{ $murid->email }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="email1" class="col-sm-4 control-label col-form-label">No HP</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" disabled value="{{ $murid->no_hp ?? '-' }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="email1" class="col-sm-4 control-label col-form-label">Alamat</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" disabled value="{{ $murid->alamat ?? '-' }}">
            </div>
        </div>
    @endslot

</x-page-content>
@endsection