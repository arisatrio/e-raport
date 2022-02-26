@extends('layouts.app')

@section('content')
<x-page-header>
    @slot('page_title')
        Manajemen Kelas
    @endslot
    @slot('breadcrumb')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kelas-siswa.index') }}">Manajemen Kelas</a></li>
            <li class="breadcrumb-item">Edit Kelas</li>
            <li class="breadcrumb-item">{{ $kelas->tingkat }} - {{ $kelas->jurusan->jurusan }} / {{ $kelas->ruanngan }}</li>
        </ol>
    @endslot
</x-page-header>

<x-page-content>

    @slot('header')
        <h4>Edit Kelas</h4>
    @endslot

    @slot('content')
        @include('layouts._alert')
        
        <form action="{{ route('admin.kelas-siswa.update', $kelas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Ajaran</label>
                <div class="col-sm-8">
                    <select class="form-control select2" name="ta_id" id="ta_id">
                        <option selected disabled>--Tahun Ajaran--</option>
                        @foreach ($ta as $t)
                        <option @if($kelas->m_tahun_ajaran_id == $t->id) selected @endif value="{{$t->id}}">{{$t->tahun_ajaran}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                <div class="col-sm-8">
                    <select class="form-control select2" name="m_jurusan_id" id="m_jurusan_id">
                        <option selected disabled>--Jurusan--</option>
                        @foreach ($jurusan as $item)
                        <option @if($kelas->m_jurusan_id == $item->id) selected @endif value="{{$item->id}}">{{$item->jurusan}} ({{$item->kode_jurusan}})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Tingkat</label>
                <div class="col-sm-8">
                    <select class="form-control select2" name="tingkat" id="tingkat">
                        <option selected disabled>--Tingkat--</option>
                        <option @if($kelas->tingkat === 'X') selected @endif value="X">X</option>
                        <option @if($kelas->tingkat === 'XI') selected @endif value="XI">XI</option>
                        <option @if($kelas->tingkat === 'XII') selected @endif value="XII">XII</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Ruangan</label>
                <div class="col-sm-8">
                    <select class="form-control select2" name="ruangan" id="ruangan">
                        <option selected disabled>--Ruangan--</option>
                        <option @if($kelas->ruangan === 'Satu') selected @endif value="Satu">Satu</option>
                        <option @if($kelas->ruangan === 'Dua') selected @endif value="Dua">Dua</option>
                        <option @if($kelas->ruangan === 'Tiga') selected @endif value="Tiga">Tiga</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-4 control-label col-form-label">Wali Kelas</label>
                <div class="col-sm-8">
                    <select class="form-control select2" name="wali_kelas_id" id="wali_kelas_id">
                        <option selected disabled>--Wali Kelas--</option>
                        @foreach ($guru as $g)
                        <option @if($kelas->wali_kelas_id == $g->id) selected @endif value="{{$g->id}}">{{$g->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary bg-kaneza float-right">Simpan</button>
        </form>
    @endslot

</x-page-content>
@endsection
@push('extra-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
@endpush
@push('extra-js')
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $('#ta_id').select2({ width: '100%' });
        $('#m_jurusans_id').select2({ width: '100%' });
        $('#tingkat').select2({ width: '100%' });
        $('#ruangan').select2({ width: '100%' });
        $('#wali_kelas_id').select2({ width: '100%' });
    </script>
@endpush