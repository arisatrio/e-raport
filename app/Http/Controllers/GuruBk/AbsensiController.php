<?php

namespace App\Http\Controllers\GuruBk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\MTahunAjaran;
use App\Models\KKelas;
use App\Models\User;
use App\Models\RAbsensi;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ta = MTahunAjaran::all();
        $kelas = KKelas::with('jurusan', 'tahunAjaran')->orderBy('m_tahun_ajaran_id')->get();

        $reqKelas = KKelas::with('jurusan', 'tahunAjaran', 'waliKelas', 'siswaKelas')->find($request->kelas_id);
        // dd($reqKelas->raporAbsensi->where('murid_id', 3));
        if($request->ajax()) {
            $data = $reqKelas->siswaKelas;

            return datatables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    return $row->siswa->name;
                })
                ->addColumn('nis', function ($row) {
                    return $row->siswa->username;
                })
                ->addColumn('hadir', function ($row) {
                    $raporIsSet = $row->siswa->raporAbsensi->where('k_kelas_id', $row->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->h.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('th', function ($row) {
                    $raporIsSet = $row->siswa->raporAbsensi->where('k_kelas_id', $row->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->th.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('izin', function ($row) {
                    $raporIsSet = $row->siswa->raporAbsensi->where('k_kelas_id', $row->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->i.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('sakit', function ($row) {
                    $raporIsSet = $row->siswa->raporAbsensi->where('k_kelas_id', $row->id)->first();
                    if($raporIsSet) {
                        return '<span class="badge badge-secondary">'.$raporIsSet->s.'</span>';
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $link = '<a href="'.route('guru-bk.input-absensi.show', ['kelas_id' => $row->id, 'murid_id' => $row->siswa->id]).'" class="btn btn-success">Input/Edit Absensi</a>';

                    return $link;
                })
                ->rawColumns(['hadir', 'th', 'izin', 'sakit', 'action'])
                ->make(true);
        }

        return view('_guru-bk.absensi.index', compact('ta', 'kelas', 'reqKelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'h' => 'required',
            'th' => 'required',
            'i' => 'required',
            's' => 'required',
        ]);

        RAbsensi::updateOrCreate(['murid_id' => $request->murid_id, 'k_kelas_id' => $request->kelas_id],[
            'm_tahun_ajaran_id' => $request->ta_id,
            'k_kelas_id'        => $request->kelas_id,
            'murid_id'          => $request->murid_id,
            'h'                 => $request->h,
            'th'                => $request->th,
            'i'                 => $request->i,
            's'                 => $request->s,
        ]);

        return redirect('/guru-bk/input-absensi?kelas_id='.$request->kelas_id)->with('messages', 'Data Absensi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kelas_id, $murid_id)
    {
        $siswa = User::find($murid_id);
        $kelas = KKelas::with('jurusan', 'tahunAjaran')->find($kelas_id);

        return view('_guru-bk.absensi.create', compact('siswa', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
