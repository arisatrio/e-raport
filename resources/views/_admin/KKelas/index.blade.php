@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Manajemen Kelas
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Manajemen Kelas</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Daftar Kelas</h4>
    @endslot

    @slot('content')
        @include('layouts._alert')

        <div style="float:right;margin-bottom:20px; margin-right:15px;">
            <button class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus"></i> Tambah Kelas</button>
            @include('layouts._modal-create',['data' => 'Kelas Siswa', 'route' => 'admin.kelas-siswa.store'])
        </div>
        <br/>

        <div class="table-responsive">
            <table id="dttable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="bg-kaneza text-white">
                    <tr>
                        <th width="5%">No</th>
                        <th>Tahun Ajaran</th>
                        <th>Kelas</th>
                        <th>Wali Kelas</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    @endslot

</x-page-content>

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
                {data: 'tahun_ajaran', name: 'tahun_ajaran'},
                {data: 'kelas', name: 'kelas'},
                {data: 'wali_kelas', name: 'wali_kelas'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
        });
        $(document).ready(function() {
            $('#ta_id').select2({ width: '100%' });
            $('#m_jurusans_id').select2({ width: '100%' });
            $('#tingkat').select2({ width: '100%' });
            $('#ruangan').select2({ width: '100%' });
            $('#wali_kelas_id').select2({ width: '100%' });

            $('#dttable').on('click', '#btn-delete', function (e) { 
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = $(this).data('id');
                var url =  "/admin/kelas-siswa/"+id;
                console.log(url);
                // confirm then
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {method: '_DELETE', submit: true}
                }).always(function (data) {
                    $('#dttable').DataTable().draw(false);
                });
            });
        });
    </script>
@endpush