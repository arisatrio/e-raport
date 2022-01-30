@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('guru-bk.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Manajemen Absesnsi</li>
                        <li class="breadcrumb-item">Input Absesnsi</li>
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

                    <h4>Input Absensi Siswa</h4>
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

                    <form action="{{ route('guru-bk.input-absensi.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-2">Hadir</label>
                            <input type="number" class="col-10 form-control" name="h">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-2">Tidak Hadir</label>
                            <input type="number" class="col-10 form-control" name="th">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-2">Izin</label>
                            <input type="number" class="col-10 form-control" name="i">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-2">Sakit</label>
                            <input type="number" class="col-10 form-control" name="s">
                        </div>
                        <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                        <input type="hidden" name="ta_id" value="{{ $kelas->tahunAjaran->id }}">
                        <input type="hidden" name="murid_id" value="{{ $siswa->id }}">
                        <hr>
                        <button class="float-right btn btn-primary bg-kaneza">Simpan</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection