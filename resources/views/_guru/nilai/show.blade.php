@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('guru.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Manajemen Nilai</li>
                        <li class="breadcrumb-item"><a href="{{ route('guru.input-nilai.index') }}">Mata Pelajaran Saya</a></li>
                        <li class="breadcrumb-item">{{ $mapel->tingkat }} - {{ $mapel->mapel }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <h4>Cari Kelas</h4>
                    <hr>

                    <form action="{{ route('guru.input-nilai.create') }}" method="GET">
                        <div class="row">
                            <div class="form-group col-6">
                                <select class="form-control select2" name="kelas_id" id="kelas_id">
                                    <option selected disabled>--Kelas--</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->tahunAjaran->tahun_ajaran }} {{ $item->tahunAjaran->semester }} - {{ $item->tingkat }} {{ $item->jurusan->jurusan }} / {{ $item->ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <select class="form-control select2" name="mapel_id" id="mapel_id">
                                    <option selected disabled>{{ $mapel->mapel }}</option>
                                </select>
                            </div>
                            <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">

                            <div class="col-3">
                                <button type="submit" class="btn btn-primary btn-block bg-kaneza">Cari</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@push('extra-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
@endpush
@push('extra-js')
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#kelas_id').select2();
        });
    </script>
@endpush