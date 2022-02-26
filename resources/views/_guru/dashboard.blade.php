@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="card shadow h-100">
                <div class="card-body">
                    
                    <h4>Halo {{ auth()->user()->name }}</h4>
                    <hr>

                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h4>Selamat Datang</h4>
                    <p>Selamat datang di website e-rapor untuk Siswa SMKN 1 Jatibarang ini. website e-rapor ini digunakan oleh siswa untuk memudahkan akses terhadap nilai rapor melalui internet.</p>
                    <p>Selamat menggunakan fasilitas ini dengan baik dan bijaksana.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection