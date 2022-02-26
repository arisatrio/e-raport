@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('guru.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Manajemen Nilai</li>
                        <li class="breadcrumb-item"><a href="{{ route('guru.input-nilai.index') }}">Mata Pelajaran Saya</a></li>
                        <li class="breadcrumb-item">{{ $mapel->tingkat }} - {{ $mapel->mapel }}</li>
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

                    <h4>Daftar Siswa</h4>
                    <hr>

                    <div class="alert alert-secondary">
                        <div class="row">
                            <div class="col-6">
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Tahun Ajaran</td>
                                            <td><b> : {{ $kelas->tahunAjaran->tahun_ajaran }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td><b> : {{ $kelas->tahunAjaran->semester }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td><b> : {{ $kelas->tingkat }}/{{ $kelas->jurusan->kode_jurusan }}/{{ $kelas->ruangan }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Jurusan</td>
                                            <td><b> : {{ $kelas->jurusan->jurusan }}</b></td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-6">
                                <table>
                                    <thead>
                                        <tr>
                                            <td>KKM</td>
                                            <td><b> : {{ $mapel->kkm }} / {{ $convertKKM }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Mata Pelajaran</td>
                                            <td><b> : {{ $mapel->tingkat }} - {{ $mapel->mapel }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Wali Kelas</td>
                                            <td><b> : {{ $kelas->waliKelas->name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Siswa</td>
                                            <td><b> : {{ $kelas->siswaKelas->count() }}</b></td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="dttable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-kaneza text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>N. Pengetahuan</th>
                                    <th>N. Keterampilan</th>
                                    <th>N. Akhir</th>
                                    <th>N. Predikat</th>
                                    <th>N. Sikap</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@push('extra-css')
    @include('layouts.datatable-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
@endpush
@push('extra-js')
    @include('layouts.datatable-js')
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script>
        var dttable = $('#dttable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'nama', name: 'nama'},
                {data: 'nis', name: 'nis'},
                {data: 'pengetahuan', name: 'pengetahuan'},
                {data: 'keterampilan', name: 'keterampilan'},
                {data: 'akhir', name: 'akhir'},
                {data: 'predikat', name: 'predikat'},
                {data: 'sikap', name: 'sikap'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
        });
        $(document).ready(function() {
            $('#kelas_id').select2();
        });
    </script>
@endpush