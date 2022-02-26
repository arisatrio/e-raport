<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\MTahunAjaran;
use App\Models\User;
use App\Models\KKelas;
use App\Models\MMapel;
use App\Models\RNilai;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ta = MTahunAjaran::all();
        $mapel = MMapel::whereHas('guru', function ($q) {
            $q->where('guru_id', auth()->user()->id);
        })
        ->get();

        return view('_guru.nilai.index', compact('ta', 'mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mapel = MMapel::find($request->mapel_id);
        $convertKKM = $this->convertNilai($mapel->kkm);
        $kelas = KKelas::with('waliKelas', 'siswaKelas')->find($request->kelas_id);

        if($request->ajax()) {
            $data = $kelas->siswaKelas;

            return datatables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    return $row->siswa->name;
                })
                ->addColumn('nis', function ($row) {
                    return $row->siswa->username;
                })
                ->addColumn('pengetahuan', function ($row) use ($kelas) {
                    $raporIsSet = $row->siswa->raporNilai->where('k_kelas_id', $kelas->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->pengetahuan.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('keterampilan', function ($row) use ($kelas) {
                    $raporIsSet = $row->siswa->raporNilai->where('k_kelas_id', $kelas->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->keterampilan.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('akhir', function ($row) use ($kelas, $mapel) {
                    $raporIsSet = $row->siswa->raporNilai->where('k_kelas_id', $kelas->id)->first();
                    if($raporIsSet) {
                        if($this->checkIfNilaiKKM($mapel->kkm, $raporIsSet->nilai_akhir)) {
                            return '<span class="badge badge-secondary">'.$raporIsSet->nilai_akhir.'</span>';
                        } else {
                            return '<span class="badge badge-danger">'.$raporIsSet->nilai_akhir.'</span>';
                        }
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('predikat', function ($row) use($kelas) {
                    $raporIsSet = $row->siswa->raporNilai->where('k_kelas_id', $kelas->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->predikat.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('sikap', function ($row) use($kelas) {
                    $raporIsSet = $row->siswa->raporNilai->where('k_kelas_id', $kelas->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->sikap.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('action', function ($row) use ($mapel, $kelas) {
                    $link = '<a href="'.route('guru.input-nilai.edit', ['kelas_id' => $kelas->id, 'murid_id' => $row->siswa->id, 'mapel_id' => $mapel->id]).'" class="btn btn-success">Input/Edit Nilai</a>';
                    return $link;
                })
                ->rawColumns(['action', 'pengetahuan', 'keterampilan', 'akhir', 'predikat', 'sikap'])
                ->make(true);
        }

        return view('_guru.nilai.create', compact('mapel', 'convertKKM', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pengetahuan'   => 'required|numeric|min:0|max:100',
            'keterampilan'  => 'required|numeric|min:0|max:100',
        ]);

        $nilaiAkhir     = ($request->pengetahuan + $request->keterampilan) / 2;
        $nilaiPredikat  = $this->convertNilaiPredikat($nilaiAkhir);
        $nilaiAkhir     = $this->convertNilai($nilaiAkhir);
        $nilaiPengetahuan = $this->convertNilai($request->pengetahuan);
        $nilaiKeterampilan = $this->convertNilai($request->keterampilan);

        if($nilaiAkhir >= 0 && $nilaiAkhir <= 50) {
            $nilaiSikap = 'K';
        } else if($nilaiAkhir >= 51 && $nilaiAkhir <= 65) {
            $nilaiSikap = 'C';
        } else if($nilaiAkhir >= 66 && $nilaiAkhir <= 80) {
            $nilaiSikap = 'B';
        } else if($nilaiAkhir >= 81 && $nilaiAkhir <= 100) {
            $nilaiSikap = 'SB';
        }

        RNilai::updateOrCreate(['murid_id' => $request->murid_id, 'k_kelas_id' => $request->kelas_id, 'mapel_id' => $request->mapel_id],[
            'm_tahun_ajaran_id'     => $request->ta_id,
            'k_kelas_id'            => $request->kelas_id,
            'murid_id'              => $request->murid_id,
            'mapel_id'              => $request->mapel_id,
            'pengetahuan'           => $nilaiPengetahuan,
            'keterampilan'          => $nilaiKeterampilan,
            'nilai_akhir'           => $nilaiAkhir,
            'predikat'              => $nilaiPredikat,
            'sikap'                 => $nilaiSikap,
        ]);

        return redirect('/guru/input-nilai/create?kelas_id='.$request->kelas_id.'&mapel_id='.$request->mapel_id)->with('messages', 'Data Nilai berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mapel = MMapel::find($id);
        $ta = MTahunAjaran::all();
        $kelas = KKelas::where('tingkat', $mapel->tingkat)->when($mapel->m_jurusan_id !== NULL, function ($q) use($mapel) {
            return $q->where('m_jurusan_id', $mapel->m_jurusan_id);
        })->get();

        return view('_guru.nilai.show', compact('mapel', 'ta', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kelas_id, $murid_id, $mapel_id)
    {
        $siswa = User::find($murid_id);
        $kelas = KKelas::with('jurusan', 'tahunAjaran')->find($kelas_id);
        $mapel = MMapel::find($mapel_id);

        return view('_guru.nilai.edit', compact('siswa', 'kelas', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function convertNilai($nilai)
    {
        if($nilai >= 0 && $nilai <= 55) {
            $nilaiConverted = '1.00';
        } else if($nilai >= 56 && $nilai <= 60) {
            $nilaiConverted = '1.33';
        } else if($nilai >= 61 && $nilai <= 65) {
            $nilaiConverted = '1.66';
        } else if($nilai >= 66 && $nilai <= 70) {
            $nilaiConverted = '2.00';
        } else if($nilai >= 71 && $nilai <= 75) {
            $nilaiConverted = '2.33';
        } else if($nilai >= 76 && $nilai <= 80) {
            $nilaiConverted = '2.66';
        } else if($nilai >= 81 && $nilai <= 85) {
            $nilaiConverted = '3.00';
        } else if($nilai >= 86 && $nilai <= 90) {
            $nilaiConverted = '3.33';
        } else if($nilai >= 91 && $nilai <= 95) {
            $nilaiConverted = '3.66';
        } else if($nilai >= 96 && $nilai <= 100) {
            $nilaiConverted = '4.00';
        } 

        return $nilaiConverted;
    }

    public function convertNilaiPredikat($nilai)
    {
        if($nilai >= 0 && $nilai <= 45) {
            $nilaiPredikat = 'D';
        } else if($nilai >= 46 && $nilai <= 50) {
            $nilaiPredikat = 'D+';
        } else if($nilai >= 51 && $nilai <= 55) {
            $nilaiPredikat = 'C-';
        } else if($nilai >= 56 && $nilai <= 60) {
            $nilaiPredikat = 'C';
        } else if($nilai >= 61 && $nilai <= 65) {
            $nilaiPredikat = 'C+';
        } else if($nilai >= 66 && $nilai <= 70) {
            $nilaiPredikat = 'B-';
        } else if($nilai >= 71 && $nilai <= 75) {
            $nilaiPredikat = 'B';
        } else if($nilai >= 76 && $nilai <= 80) {
            $nilaiPredikat = 'B+';
        } else if($nilai >= 81 && $nilai <= 85) {
            $nilaiPredikat = 'A-';
        } else if($nilai >= 86 && $nilai <= 100) {
            $nilaiPredikat = 'A+';
        }

        return $nilaiPredikat;
    }

    public function checkIfNilaiKKM($kkm, $nilai)
    {
        if(strval($nilai) == '1.00') {
            $nilaiAngka = 55;
        } else if(strval($nilai) == '1.33') {
            $nilaiAngka = 60;
        } else if(strval($nilai) == '1.66') {
            $nilaiAngka = 65;
        } else if(strval($nilai) == '2.00') {
            $nilaiAngka = 70;
        } else if(strval($nilai) == '2.33') {
            $nilaiAngka = 75;
        } else if(strval($nilai) == '2.66') {
            $nilaiAngka = 80;
        } else if(strval($nilai) == '3.00') {
            $nilaiAngka = 85;
        } else if(strval($nilai) == '3.33') {
            $nilaiAngka = 90;
        } else if(strval($nilai) == '3.66') {
            $nilaiAngka = 95;
        } else if(strval($nilai) == '4.00') {
            $nilaiAngka = 100;
        } 

        //return strval($nilai);
        if($nilaiAngka > $kkm) {
            return true;
        } else {
            return false;
        }
    }
}
