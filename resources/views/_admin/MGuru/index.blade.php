@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Data Guru
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Data Guru</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Data Guru</h4>
    @endslot

    @slot('content')
        @include('layouts._alert')

        <div class="alert alert-success">
            <p>Akun Guru login ke sistem menggunakan NIP. <i>Contoh: NIP <b>12345678</b> PASSWORD <b>@123456</b></i></p>
        </div>

        <x-datatable>
            @slot('header')
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus"></i> Tambah Data Guru</button>
                @include('layouts._modal-create',['data' => 'Guru', 'route' => 'admin.guru.store'])
            @endslot

            @slot('table_content')
                <thead class="bg-kaneza text-white">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Guru</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <a href="{{ route('admin.guru.show', $item->id) }}" class="btn btn-secondary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.guru.edit', $item->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                @include('layouts._modal-delete',['data' => 'Guru', 'itemDel' => $item->name, 'route' => 'admin.guru.destroy'])
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