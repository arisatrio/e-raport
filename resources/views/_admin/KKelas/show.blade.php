@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Kelas {{ $kelas->tingkat }} {{ $kelas->jurusan->kode_jurusan }} / {{ $kelas->ruangan }}
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kelas-siswa.index') }}">Kelas</a></li>
            <li class="breadcrumb-item">Kelas {{ $kelas->tingkat }} {{ $kelas->jurusan->kode_jurusan }} / {{ $kelas->ruangan }} {{ $kelas->tahunAjaran->tahun_ajaran }}</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>
    
    @slot('header')
        <h4>Data Siswa</h4>
    @endslot
    
    @slot('content')
        @include('layouts._alert')

        <x-datatable>
            @slot('header')
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="mdi mdi-account-plus"></i> Tambah Siswa</button>
                <div class="modal fade" id="modal-create" tabindex="-1">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable2">
                                        <thead class="bg-kaneza text-white">
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Nama Siswa</th>
                                                <th>NISN</th>
                                                <th>Tahun Angakatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allSiswa as $item)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->angkatan }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <div class="form-group mb-0 float-right">
                                    <button type="button" class="btn btn-dark waves-effect waves-light" data-dismiss="modal" aria-label="Close">Batal</button>
                                    <button type="submit" id="btn-save" class="btn btn-info bg-kaneza waves-effect waves-light">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endslot

            @slot('table_content')
                <thead class="bg-kaneza text-white">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Siswa</th>
                        <th>NIS</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswaKelas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->siswa->name }}</td>
                            <td>{{ $item->siswa->username }}</td>
                            <td>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-detail-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endslot
        </x-datatable>
    @endslot
</x-page-content>
@endsection

@push('extra-css')
    @include('layouts.datatable-css')
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
@endpush
@push('extra-js')
    @include('layouts.datatable-js')
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function() {
            var dttable = $('#datatable').DataTable();
            var allSiswaTable = $('#datatable2').DataTable({
                columnDefs: [ 
                {
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0,
                },
                {
                    "targets": [ 1 ],
                    "visible": false
                }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                },
                order: [[ 1, 'asc' ]]
            });

            $('#datatable2 tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');
            } );

            $('#btn-save').click(function (e) {
                e.preventDefault();
                
                var selectedSiswa = allSiswaTable.rows('.selected').column(1).data().toArray();
                var idKelas = '{{ $kelas->id }}';

                $.ajax({
                    url         : "{{ route('admin.add-siswa-to-kelas.store') }}",
                    type        : 'POST',
                    dataType    : 'json',
                    data        : {
                        selectedSiswa: selectedSiswa,
                        idKelas: idKelas,
                    },
                    success: function (data) {
                        if(data.errors) {
                            var values = '';
                            jQuery.each(data.errors, function (key, value) {
                                values += value
                            });
                        } else {
                            location.reload();
                            $('#modal-create').modal('hide');
                        }
                    }, 
                    error: function(xhr, ajaxOptions, thrownError, data){
                        alert(xhr.responseText);
                    },
                });
            });
        } );
    </script>
@endpush