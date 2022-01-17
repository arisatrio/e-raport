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

    <div class="row mb-4">
        <div class="col-lg-4 col-sm-12">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h4>{{ auth()->user()->name }}</h4>
                    <p class="mb-0">NISN : {{ auth()->user()->username }}</p>
                    <p class="mb-0">Tahun Angkatan {{ auth()->user()->angkatan }}</p>
                    <small>{{ auth()->user()->alamat }}</small>
                    {{ auth()->user()->siswaKelas->first()->jurusan->jurusan }}
                    <p>Kelas {{ auth()->user()->siswaKelas->first()->tingkat }} {{ auth()->user()->siswaKelas->first()->jurusan->kode_jurusan }} {{ auth()->user()->siswaKelas->first()->ruangan }}</p>
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

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <h4>Mata Pelajaran</h4>
                    <p>{{ auth()->user()->siswaKelas->first()->tingkat }} {{ auth()->user()->siswaKelas->first()->jurusan->kode_jurusan }} {{ auth()->user()->siswaKelas->first()->ruangan }} / Semester {{ $ta->semester }} {{ $ta->tahun_ajaran }}</p>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-kaneza text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Guru</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mapel as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->mapel }}</td>
                                    <td>{{ $item->guru->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection