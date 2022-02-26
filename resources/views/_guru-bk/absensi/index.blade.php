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
            @if($reqKelas)
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
                                            <td><b> : {{ $reqKelas->tahunAjaran->tahun_ajaran }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td><b> : {{ $reqKelas->tahunAjaran->semester }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td><b> : {{ $reqKelas->tingkat }}/{{ $reqKelas->jurusan->kode_jurusan }}/{{ $reqKelas->ruangan }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Jurusan</td>
                                            <td><b> : {{ $reqKelas->jurusan->jurusan }}</b></td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-6">
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td><b> : Rekap Absensi</b></td>
                                        </tr>
                                        <tr>
                                            <td>Wali Kelas</td>
                                            <td><b> : {{ $reqKelas->waliKelas->name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Siswa</td>
                                            <td><b> : {{ $reqKelas->siswaKelas->count() }}</b></td>
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
                                    <th>Hadir</th>
                                    <th>Tidak Hadir</th>
                                    <th>Izin</th>
                                    <th>Sakit</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            
            <div class="modal fade" id="modal-create" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Absensi Siswa </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('guru-bk.input-absensi.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-2">Hadir</label>
                                    <input type="number" class="col-10 form-control" name="hadir">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-2">Tidak Hadir</label>
                                    <input type="number" class="col-10 form-control" name="th">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-2">Izin</label>
                                    <input type="number" class="col-10 form-control" name="izin">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-2">Sakit</label>
                                    <input type="number" class="col-10 form-control" name="sakit">
                                </div>
                                <input type="hidden" name="kelas_id" value="{{ $reqKelas->id }}">
                                <input type="hidden" name="ta_id" value="{{ $reqKelas->tahunAjaran->id }}">
                                <hr>
                                <button class="float-right btn btn-primary bg-kaneza">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif

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
                {data: 'hadir', name: 'hadir'},
                {data: 'th', name: 'th'},
                {data: 'izin', name: 'izin'},
                {data: 'sakit', name: 'sakit'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all"
            }] 
        });
        $(document).ready(function() {
            $('#kelas_id').select2();
        });
    </script>
@endpush