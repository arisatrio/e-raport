@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Data Guru BK
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Data Guru BK</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Data Guru BK</h4>
    @endslot

    @slot('content')
        @include('layouts._alert')

        <div class="alert alert-success">
            <p>Akun Guru BK login ke sistem menggunakan NIP. <i>Contoh: NIP <b>12345678</b> PASSWORD <b>@123456</b></i></p>
        </div>

        <div style="float:right;margin-bottom:20px; margin-right:15px;">
            <button class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus"></i> Tambah Data Guru BK</button>
            @include('layouts._modal-create',['data' => 'Guru', 'route' => 'admin.guru-bk.store'])
        </div>

        <br>
        
        <div class="table-responsive">
            <table id="dttable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="bg-kaneza text-white">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Guru</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>No HP</th>
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
@endpush
@push('extra-js')
    @include('layouts.datatable-js')
    <script>
        var dttable = $('#dttable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'nohp', name: 'nohp'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
        });
    </script>
@endpush