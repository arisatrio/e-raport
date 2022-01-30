@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('guru.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Manajemen Nilai</li>
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

                    <form action="">
                        <div class="row">
                            <div class="form-group col-3">
                                <select class="form-control select2" name="tahun_ajaran_id" id="tahun_ajaran_id">
                                    <option selected disabled>--Tahun Ajaran--</option>
                                    @foreach ($ta as $item)
                                        <option value="{{ $item->id }}">{{ $item->tahun_ajaran }} - {{ $item->semester }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <select class="form-control select2" name="kelas_id" id="kelas_id">
                                    <option selected disabled>--Kelas--</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->tingkat }} {{ $item->jurusan->jurusan }} / {{ $item->ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <select class="form-control select2" name="semester_id" id="semester_id">
                                    <option selected disabled>--Mata Pelajaran--</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <button type="submit" class="btn btn-primary btn-block bg-kaneza">Cari</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            {{-- <div class="card">
                <div class="card-body">

                    <h4>Input Nilai Siswa</h4>
                    <hr>
                    
                    <table id="dttable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="bg-kaneza text-white">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Nilai Siswa</th>
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="modal fade" id="modal-create" tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Siswa </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="">
                                        <div class="form-group row">
                                            <label for="" class="col-2">Nilai</label>
                                            <input type="text" class="col-10 form-control">
                                        </div>
                                        <hr>
                                        <button class="float-right btn btn-primary bg-kaneza">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div> --}}


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
                {data: 'username', name: 'username'},
                {data: 'name', name: 'name'},
                {data: 'kelas', name: 'kelas'},
                {data: 'nilai', name: 'nilai'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
        });
        $(document).ready(function() {
            $('#tahun_ajaran_id').select2();
            $('#kelas_id').select2();
            $('#semester_id').select2();
        });
    </script>
@endpush