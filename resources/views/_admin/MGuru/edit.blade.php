@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Manajemen Kelas
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kelas-siswa.index') }}">Manajemen Guru</a></li>
            <li class="breadcrumb-item">Edit Guru</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Edit Guru</h4>
    @endslot

    @slot('content')
        @include('layouts._alert')
        <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Nama</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{ $guru->name }}" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">NIP</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{ $guru->username }}" name="username">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{ $guru->email }}" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">No HP</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{ $guru->no_hp ?? '-' }}" name="nohp">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="{{ $guru->alamat ?? '-' }}" name="alamat">
                </div>
            </div>

            <button class="btn btn-primary bg-kaneza float-right" type="submit">SIMPAN</button>
        </form>
    @endslot

</x-page-content>
@endsection