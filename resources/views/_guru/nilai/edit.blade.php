@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('guru-bk.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Manajemen Nilai</li>
                        <li class="breadcrumb-item"><a href="{{ route('guru.input-nilai.index') }}">Mata Pelajaran Saya</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('guru.input-nilai.create') }}">{{ $mapel->tingkat }} - {{ $mapel->mapel }}</a></li>
                        <li class="breadcrumb-item">Input Nilai</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">

                    <h4>Input Nilai Siswa</h4>
                    <hr>

                    <div class="alert alert-secondary">
                        <table>
                            <thead>
                                <tr>
                                    <td>Nama</td>
                                    <td><b> : {{ $siswa->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>NIS</td>
                                    <td><b> : {{ $siswa->username }}</b></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td><b> : {{ $kelas->tingkat }}/{{ $kelas->jurusan->kode_jurusan }}/{{ $kelas->ruangan }}</b></td>
                                </tr>
                                <tr>
                                    <td>Tahun Ajaran</td>
                                    <td><b> : {{ $kelas->tahunAjaran->tahun_ajaran }} {{ $kelas->tahunAjaran->semester }}</b></td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="alert alert-success">
                        <p>Masukkan nilai dalam format puluhan.</p>
                    </div>

                    <form action="{{ route('guru.input-nilai.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-2">Nilai Pengetahuan</label>
                            <input type="number" class="col-10 form-control" name="pengetahuan">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-2">Nilai Keterampilan</label>
                            <input type="number" class="col-10 form-control" name="keterampilan">
                        </div>
                        <input type="hidden" name="ta_id" value="{{ $kelas->tahunAjaran->id }}">
                        <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                        <input type="hidden" name="murid_id" value="{{ $siswa->id }}">
                        <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                        <hr>
                        <button class="float-right btn btn-primary bg-kaneza">Simpan</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection