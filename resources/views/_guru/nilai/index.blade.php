@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('guru.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Manajemen Nilai</li>
                        <li class="breadcrumb-item">Mata Pelajaran Saya</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">

        @foreach ($mapel as $item)
        <div class="col-3">
            <div class="card h-100 bg-kaneza">
                <div class="card-body">
                    <a href="{{ route('guru.input-nilai.show', $item->id) }}" class="text-white row">
                        <h4 class="col-10">{{ $item->tingkat }} - {{ $item->mapel }}</h4>
                        <i class="fas fa-book fa-2x col-2 float-right" style="opacity: 0.5;"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        
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
            $('#tahun_ajaran_id').select2();
            $('#kelas_id').select2();
            $('#semester_id').select2();
        });
    </script>
@endpush