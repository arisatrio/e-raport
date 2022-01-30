@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Kelas
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Kelas</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Kelas</h4>
    @endslot

    @slot('content')
        @include('layouts._alert')
        <div class="alert alert-success">
            <p>Akun Wali Kelas login ke sistem menggunakan Username <b>tingkat-kode jurusan-ruangan-tahun ajaran</b> (format huruf kecil) dan Password <b>@123456</b>. <br> <i>Contoh: Username <b>x-tkj-satu-2021/2022</b> Password <b>@123456</b></i></p>
        </div>

        {{-- <x-datatable>
            @slot('header')
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus"></i> Tambah Kelas</button>
                @include('layouts._modal-create',['data' => 'Kelas Siswa', 'route' => 'admin.kelas-siswa.store'])
            @endslot

            @slot('table_content')
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
            @endslot
        </x-datatable> --}}

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
        });
    </script>
@endpush