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
        @if (session('messages'))
        <div class="alert alert-success alert-dismissible">
            {{ session('messages') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-datatable>
            @slot('header')
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus"></i> Tambah Kelas</button>
                @include('layouts._modal-create', ['data' => 'Kelas', 'route' => 'admin.kelas.store'])
            @endslot

            @slot('table_content')
                <thead class="bg-kaneza text-white">
                    <tr>
                        <th width="5%">No</th>
                        <th>Tahun Ajaran</th>
                        <th>Kelas</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->tahunAjaran->tahun_ajaran}}</td>
                            <td>{{$item->kelas}} - {{$item->jurusan->kode_jurusan}}</td>
                            <td>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-detail-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                @include('layouts._modal-show', ['data' => 'Kelas', 'tahun_ajaran' => $item->tahunAjaran->tahun_ajaran, 'jurusan' => $item->jurusan->jurusan, 'kelas' => $item->kelas])
                                @include('layouts._modal-edit', ['data' => 'Kelas', 'route' => 'admin.kelas.update', 'itemTahun_ajaran' => $item->m_tahun_ajarans_id, 'itemJurusan' => $item->m_jurusans_id, 'kelas' => $item->kelas])
                                @include('layouts._modal-delete', ['data' => 'Kelas', 'itemDel' => $item->kelas.' '.$item->jurusan->jurusan.' '.$item->tahunAjaran->tahun_ajaran, 'route' => 'admin.tahun-ajaran.destroy'])
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
@endpush
@push('extra-js')
    @include('layouts.datatable-js')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@endpush