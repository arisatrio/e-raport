@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Profile Saya</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Profile Saya</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col">

            <div class="card shadow">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="email1" class="col-sm-2 control-label col-form-label">Nama</label>
                        <input type="text" class="form-control col-sm-10" name="nama" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-2 control-label col-form-label">NISN</label>
                        <input type="text" class="form-control col-sm-10" name="username" value="{{ auth()->user()->username }}" required>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-2 control-label col-form-label">Email</label>
                        <input type="text" class="form-control col-sm-10" name="email" value="{{ auth()->user()->email }}" required>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-2 control-label col-form-label">No HP</label>
                        <input type="text" class="form-control col-sm-10" name="no_hp" value="{{ auth()->user()->nohp }}" required>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-2 control-label col-form-label">Alamat</label>
                        <textarea class="form-control col-sm-10" name="alamat" cols="30" rows="5"></textarea>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection