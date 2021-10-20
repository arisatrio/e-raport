@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Tambah Tahun Ajaran
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.tahun-ajaran.index') }}">Tahun Ajaran</a></li>
            <li class="breadcrumb-item">Tambah Tahun Ajaran</li>
        </ol>
    @endslot
</x-page-header>
<x-page-content>
    @slot('header')
        <h4>Tambah Tahun Ajaran</h4>
    @endslot

    @slot('content')
        <form class="form-horizontal" id="form-upload-preview" method="POST" action="{{ route('admin.tahun-ajaran.store') }}">
            @csrf
            <div class="form-group row">
                <label for="email1" class="col-sm-2 control-label col-form-label">Tahun Ajaran</label>
                <input type="text" class="form-control col-sm-10" name="tahun_ajaran"required>
            </div>
            <div class="form-group mb-0 float-right">
                <button type="submit" id="btn-upload-preview" class="btn btn-info waves-effect waves-light">Simpan</button>
                <a href="{{ route('admin.tahun-ajaran.index') }}" class="btn btn-dark waves-effect waves-light">Batal</a>
            </div>
        </form>
    @endslot
</x-page-content>
@endsection