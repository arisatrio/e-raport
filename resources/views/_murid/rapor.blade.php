@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Rapor Saya</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Rapor Saya</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col">

            <div class="card shadow">
                <div class="card-body">
                    {{-- <h4>Rapor Saya</h4>
                    <hr> --}}
                    <div class="form-group row">
                        <label for="email1" class="col-sm-2 control-label col-form-label">Pilih Semester</label>
                        <select class="form-control col-sm-8" name="m_jurusans_id">
                            <option selected disabled>--Semester--</option>
                        </select>
                        
                        <button type="submit" class="btn btn-block btn-primary bg-kaneza ml-5 col-1">Cari</button>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-body">
                    
                    <div class="card col-6">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <td>: {{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <th>NIS / NISN</th>
                                    <td>: 080808 / 080808</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>: {{ auth()->user()->siswaKelas->first()->tingkat }} {{ auth()->user()->siswaKelas->first()->jurusan->kode_jurusan }} {{ auth()->user()->siswaKelas->first()->ruangan }}</td>
                                </tr>
                                <tr>
                                    <th>Semester / Tahun Ajaran</th>
                                    <td>: {{ $ta->semester }} {{ $ta->tahun_ajaran }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <hr>

                    <h4>A. Nilai Akademik</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered" style="border-collapse: collapse; width: 100%;">
                            <thead class="bg-light text-bold">
                                <tr>
                                    <th width="5%"><b>No</b></th>
                                    <th><b>Mata Pelajaran</b></th>
                                    <th><b>Pengetahuan</b></th>
                                    <th><b>Keterampilan</b></th>
                                    <th><b>Nilai Akhir</b></th>
                                    <th><b>Predikat</b></th>
                                    <th><b>Sikap</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>A</b></td>
                                    <td colspan="6"><b>Muatan Nasional</b></td>
                                </tr>
                                @foreach ($mapelUmum as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->mapel }}</td>
                                        <td class="text-center">90</td>
                                        <td class="text-center">70</td>
                                        <td class="text-center">88</td>
                                        <td class="text-center">B+</td>
                                        <td class="text-center">B</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><b>B</b></td>
                                    <td colspan="6"><b>Muatan Kewilayahan</b></td>
                                </tr>
                                <tr>
                                    <td><b>C</b></td>
                                    <td colspan="6"><b>Muatan Peminatan Kejuruan</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4>B. Catatan Akademik</h4>
                    <p style="border-style: solid; border-width: 2px; padding: 10px;">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas voluptatibus debitis eligendi blanditiis inventore, explicabo harum mollitia similique quis molestiae.
                    </p>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection