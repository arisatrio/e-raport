@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Tahun Ajaran
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Tahun Ajaran</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Tahun Ajaran</h4>
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
                <a href="{{ route('admin.tahun-ajaran.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Tahun Ajaran</a>
            @endslot

            @slot('table_content')
                <thead class="bg-kaneza text-white">
                    <tr>
                        <th width="5%">No</th>
                        <th>Tahun Ajaran</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ta as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->tahun_ajaran}}</td>
                            <td>
                                <a href="{{ route('admin.tahun-ajaran.edit', $item->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-detail-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                <!-- Modal Detail-->
                                <div class="modal fade" id="modal-detail-{{$item->id}}" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Ajaran</label>
                                                    <input type="text" class="form-control col-sm-8" name="tahun_ajaran" value="{{$item->tahun_ajaran}}" disabled>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Delete-->
                                <div class="modal fade" id="modal-delete-{{$item->id}}" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Tahun Ajaran {{$item->tahun_ajaran}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('admin.tahun-ajaran.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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