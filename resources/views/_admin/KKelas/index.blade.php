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

        <x-datatable>
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
                    @foreach ($kelas as $item)
                        @foreach ($item->waliKelas as $walas)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$walas->pivot->ta}}</td>
                            <td>{{$item->tingkat}} {{$item->jurusan->kode_jurusan}} / {{$item->ruangan}}</td>
                            <td>{{$walas->name}}</td>
                            <td>
                                <a href="{{ route('admin.kelas-siswa.show', $item->id) }}" class="btn btn-info bg-kaneza" ><i class="mdi mdi-account-plus"></i> Tambah Siswa</a>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-detail-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button> --}}
                                <a href="{{ route('admin.kelas-siswa.show', $item->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                {{-- @include('layouts._modal-show', ['data' => 'Kelas Siswa'])
                                @include('layouts._modal-edit', ['data' => 'Ekstrakulikuler', 'route' => 'admin.ekstrakulikuler.update'])
                                @include('layouts._modal-delete',['data' => 'Ekstrakulikuler', 'itemDel' => $item->nama_eskul, 'route' => 'admin.ekstrakulikuler.destroy']) --}}
                            </td>
                        </tr>                        
                        @endforeach
                    @endforeach
                </tbody>
            @endslot
        </x-datatable>
    @endslot

</x-page-content>

@endsection
@push('extra-css')
    @include('layouts.datatable-css')
@endpush
@push('extra-js')
    @include('layouts.datatable-js')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@endpush