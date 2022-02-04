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
                    <table>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <td>: {{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <td>: {{ auth()->user()->username }} / {{ auth()->user()->username }}</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>: {{ $reqKelas->tingkat }} {{ $reqKelas->jurusan->kode_jurusan }} {{ $reqKelas->ruangan }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Ajaran / Semester</th>
                                <td>: {{ $reqKelas->tahunAjaran->tahun_ajaran }} {{ $reqKelas->tahunAjaran->semester }}</td>
                            </tr>
                        </thead>
                    </table>

                    <hr>

                    <h4>A. Nilai Akademik</h4>
                    <div class="col-12">
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
                                        <td colspan="7"><b>A. Muatan Nasional</b></td>
                                    </tr>
                                    @foreach ($mapel->where('golongan', 'A. Muatan Nasional') as $item)
                                        @php
                                            $nilai = $item->nilaiRapor()->siswaIs(auth()->user()->id, $reqKelas->id)->first()
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->mapel }}</td>
                                            <td class="text-center">{{ $nilai->pengetahuan ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->keterampilan ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->nilai_akhir ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->predikat ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->sikap ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="7"><b>B. Muatan Kewilayahan</b></td>
                                    </tr>
                                    @foreach ($mapel->where('golongan', 'B. Muatan Kewilayahan') as $item)
                                        @php
                                            $nilai = $item->nilaiRapor()->siswaIs(auth()->user()->id, $reqKelas->id)->first()
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->mapel }}</td>
                                            <td class="text-center">{{ $nilai->pengetahuan ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->keterampilan ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->nilai_akhir ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->predikat ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->sikap ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="7"><b>C. Muatan Peminatan Kejuruan</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><b>{{ $mapel->whereNotNull('m_jurusan_id')->first()->golongan }}</b></td>
                                    </tr>
                                    @foreach ($mapel->whereNotNull('m_jurusan_id') as $item)
                                        @php
                                            $nilai = $item->nilaiRapor()->siswaIs(auth()->user()->id, $reqKelas->id)->first()
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->mapel }}</td>
                                            <td class="text-center">{{ $nilai->pengetahuan ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->keterampilan ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->nilai_akhir ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->predikat ?? '-' }}</td>
                                            <td class="text-center">{{ $nilai->sikap ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="7"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><b>Total Nilai</b></td>
                                        <td colspan="3"><b>{{ $totalNilai }}</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><b>Rata-rata</b></td>
                                        <td colspan="3"><b>{{ $rerataNilai }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h4>B. Catatan Akademik</h4>
                    <div class="col-12">
                        @if($raporCatatan)
                        <p style="border-style: solid; border-width: 2px; padding: 20px; border-color: #DEE2E6">
                            {{ $raporCatatan->catatan }}
                        </p>
                        @else
                            -
                        @endif
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered" style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr>
                                    <td rowspan="3" class="bg-light align-middle">Ekstrakulikuler</td>
                                </tr>
                                <tr>
                                    <td>1. CEK</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>1. CEK</td>
                                    <td>B</td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <h4>C. Rekap Absensi</h4>
                    <div class="col-md-3">
                        <table class="table table-bordered" style="border-collapse: collapse; width: 100%;">
                            <thead>
                                {{-- <tr>
                                    <td class="bg-light">Hadir</td>
                                    <td>@if($raporAbsensi) {{ $raporAbsensi->h }} @else - @endif</td>
                                </tr> --}}
                                <tr>
                                    <td class="bg-light">Tidak Hadir</td>
                                    <td>@if($raporAbsensi) {{ $raporAbsensi->th }} @else - @endif</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Izin</td>
                                    <td>@if($raporAbsensi) {{ $raporAbsensi->i }} @else - @endif</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Sakit</td>
                                    <td>@if($raporAbsensi) {{ $raporAbsensi->s }} @else - @endif</td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection