@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Mata Pelajaran Kejuruan
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Mata Pelajaran Kejuruan</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Mata Pelajaran Kejuruan</h4>
    @endslot

    @slot('content')
        @include('layouts._alert')

        <x-datatable>
            @slot('header')
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus"></i> Tambah Mata Pelajaran Kejuruan</button>
                @include('layouts._modal-create',['data' => 'Mata Pelajaran Kejuruan', 'route' => 'admin.mapel-jurusan.store'])
            @endslot

            @slot('table_content')
                <thead class="bg-kaneza text-white">
                    <tr>
                        <th width="5%">No</th>
                        <th>Jurusan</th>
                        <th width="5%">Tingkat</th>
                        <th>Golongan</th>
                        <th>Mata Pelajaran</th>
                        <th>KKM</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->mapelJurusan->jurusan}}</td>
                            <td>{{$item->tingkat}}</td>
                            <td>{{$item->golongan}}</td>
                            <td>{{$item->mapel}}</td>
                            <td>{{$item->kkm}}</td>
                            <td>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-detail-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                @include('layouts._modal-show', ['data' => 'Mata Pelajaran Kejuruan'])
                                @include('layouts._modal-edit', ['data' => 'Mata Pelajaran Kejuruan', 'route' => 'admin.mapel-jurusan.update'])
                                @include('layouts._modal-delete', ['data' => 'Mata Pelajaran Kejuruan', 'itemDel' => $item->mapel, 'route' => 'admin.mapel-jurusan.destroy'])
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