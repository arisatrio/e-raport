@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Jurusan
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Jurusan</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Jurusan</h4>
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

        <x-datatable>
            @slot('header')
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus"></i> Tambah Jurusan</button>
                @include('layouts._modal-create',['data' => 'Jurusan', 'route' => 'admin.jurusan.store'])
            @endslot

            @slot('table_content')
                <thead class="bg-kaneza text-white">
                    <tr>
                        <th width="5%">No</th>
                        <th>Jurusan</th>
                        <th>Kode Jurusan</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurusan as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->jurusan}}</td>
                            <td>{{$item->kode_jurusan}}</td>
                            <td>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-detail-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                @include('layouts._modal-show', ['data' => 'Jurusan', 'jurusan' => $item->jurusan, 'kode_jurusan' => $item->kode_jurusan])
                                @include('layouts._modal-edit', ['data' => 'Jurusan', 'route' => 'admin.jurusan.update'])
                                @include('layouts._modal-delete',['data' => 'Jurusan', 'itemDel' => $item->jurusan, 'route' => 'admin.jurusan.destroy'])
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