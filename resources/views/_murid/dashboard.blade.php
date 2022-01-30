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
                    {{ auth()->user()->kelasSiswa->first()->kelas->jurusan->jurusan }}
                    {{-- <p>Kelas {{ auth()->user()->kelasSiswa->first()->tingkat }} {{ auth()->user()->kelasSiswa->first()->jurusan->kode_jurusan }} {{ auth()->user()->siswaKelas->first()->ruangan }}</p> --}}
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
                    <h4>Rapor Saya</h4>
                    
                    <hr>

                    <form action="{{ route('murid.rapor.index') }}" method="GET">
                        <div class="row">
                            <div class="form-group col-9">
                                <select class="form-control select2" name="kelas_id" id="kelas_id">
                                    <option selected disabled>--Pilih Kelas--</option>
                                    @foreach ($kelasSiswa as $item)
                                        <option value="{{ $item->id }}">{{ $item->tingkat }} {{ $item->jurusan->jurusan }} / {{ $item->ruangan }} - {{ $item->tahunAjaran->tahun_ajaran }} {{ $item->tahunAjaran->semester }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-3">
                                <button type="submit" class="btn btn-primary btn-block bg-kaneza">Cari</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection