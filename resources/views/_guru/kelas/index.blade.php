@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Manajemen Kelas</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelas Saya</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <h4>Kelas Saya</h4>
                    
                    <hr>

                    <form action="{{ route('guru.kelas-saya.create') }}" method="GET">
                        <div class="row">
                            <div class="form-group col-9">
                                <select class="form-control select2" name="kelas_id" id="kelas_id">
                                    <option selected disabled>--Pilih Kelas--</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->tingkat }} {{ $item->jurusan->jurusan }} / {{ $item->ruangan }} - {{ $item->tahunAjaran->tahun_ajaran }} {{ $item->tahunAjaran->semester }}</option>
                                    @endforeach
                                </select>
                            </div>

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