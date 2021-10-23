@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Ekstrakulikuler
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Ekstrakulikuler</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Ekstrakulikuler</h4>
    @endslot

    @slot('content')
        @include('layouts._alert')

        <x-datatable>
            @slot('header')
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus"></i> Tambah Ekstrakulikuler</button>
                @include('layouts._modal-create',['data' => 'Ekstrakulikuler', 'route' => 'admin.ekstrakulikuler.store'])
            @endslot

            @slot('table_content')
                <thead class="bg-kaneza text-white">
                    <tr>
                        <th width="5%">No</th>
                        <th>Ekstrakulikuler</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eskul as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama_eskul}}</td>
                            <td>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-detail-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                @include('layouts._modal-show', ['data' => 'Ekstrakulikuler'])
                                @include('layouts._modal-edit', ['data' => 'Ekstrakulikuler', 'route' => 'admin.ekstrakulikuler.update'])
                                @include('layouts._modal-delete',['data' => 'Ekstrakulikuler', 'itemDel' => $item->nama_eskul, 'route' => 'admin.ekstrakulikuler.destroy'])
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