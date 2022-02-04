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
                ->addColumn('pengetahuan', function ($row) {
                    $raporIsSet = $row->siswa->raporNilai->where('k_kelas_id', $row->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->pengetahuan.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('keterampilan', function ($row) {
                    $raporIsSet = $row->siswa->raporNilai->where('k_kelas_id', $row->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->keterampilan.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('akhir', function ($row) {
                    $raporIsSet = $row->siswa->raporNilai->where('k_kelas_id', $row->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->nilai_akhir.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('predikat', function ($row) {
                    $raporIsSet = $row->siswa->raporNilai->where('k_kelas_id', $row->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->predikat.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('sikap', function ($row) {
                    $raporIsSet = $row->siswa->raporNilai->where('k_kelas_id', $row->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->sikap.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('action', function ($row) use ($mapel) {
                    $link = '<a href="'.route('guru.input-nilai.edit', ['kelas_id' => $row->id, 'murid_id' => $row->siswa->id, 'mapel_id' => $mapel->id]).'" class="btn btn-success">Input/Edit Nilai</a>';
                    return $link;
                })
                ->rawColumns(['action', 'pengetahuan', 'keterampilan', 'akhir', 'predikat', 'sikap'])
                ->make(true);
        }

        return view('_guru.nilai.create', compact('mapel', 'kelas'));
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
        if($nilaiAkhir >= 0 && $nilaiAkhir <= 45) {
            $nilaiPredikat = 'D';
        } else if($nilaiAkhir >= 46 && $nilaiAkhir <= 50) {
            $nilaiPredikat = 'D+';
        } else if($nilaiAkhir >= 51 && $nilaiAkhir <= 55) {
            $nilaiPredikat = 'C-';
        } else if($nilaiAkhir >= 56 && $nilaiAkhir <= 60) {
            $nilaiPredikat = 'C';
        } else if($nilaiAkhir >= 61 && $nilaiAkhir <= 65) {
            $nilaiPredikat = 'C+';
        } else if($nilaiAkhir >= 66 && $nilaiAkhir <= 70) {
            $nilaiPredikat = 'B-';
        } else if($nilaiAkhir >= 71 && $nilaiAkhir <= 75) {
            $nilaiPredikat = 'B';
        } else if($nilaiAkhir >= 76 && $nilaiAkhir <= 80) {
            $nilaiPredikat = 'B+';
        } else if($nilaiAkhir >= 81 && $nilaiAkhir <= 85) {
            $nilaiPredikat = 'A-';
        } else if($nilaiAkhir >= 86 && $nilaiAkhir <= 100) {
            $nilaiPredikat = 'A+';
        } 

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
            'pengetahuan'           => $request->pengetahuan,
            'keterampilan'          => $request->keterampilan,
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
}
