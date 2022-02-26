@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Manajemen Siswa
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.siswa.index') }}">Manajemen Siswa</a></li>
            <li class="breadcrumb-item">Edit Siswa</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Edit Siswa</h4>
    @endslot

    @slot('content')
        @include('layouts._alert')
        <form action="{{ route('admin.siswa.update', $murid->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Nama</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{ $murid->name }}" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">NIP</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{ $murid->username }}" name="username">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{ $murid->email }}" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">No HP</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{ $murid->no_hp ?? '-' }}" name="nohp">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{ $murid->alamat ?? '-' }}" name="alamat">
                </div>
            </div>

            <button class="btn btn-primary bg-kaneza float-right" type="submit">SIMPAN</button>
        </form>
    @endslot

</x-page-content>
@endsection