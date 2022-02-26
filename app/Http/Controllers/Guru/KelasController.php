<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\KKelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kelas = KKelas::where('wali_kelas_id', auth()->user()->id)->get();

        return view('_guru.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kelas = KKelas::with('waliKelas', 'siswaKelas', 'jurusan')->find($request->kelas_id);

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
                ->addColumn('eskul', function ($row) use($kelas) {
                    $raporIsSet = $row->siswa->raporCatatan->where('k_kelas_id', $kelas->id)->first();
                    if($raporIsSet) {
                        return $raporIsSet->eskul->nama_eskul;
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('nilai_eskul', function ($row) use($kelas) {
                    $raporIsSet = $row->siswa->raporCatatan->where('k_kelas_id', $kelas->id)->first();
                    if($raporIsSet) {
                        return $raporIsSet->nilai_eskul;
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('catatan', function ($row) use($kelas) {
                    $raporIsSet = $row->siswa->raporCatatan->where('k_kelas_id', $kelas->id)->first();
                    if($raporIsSet) {
                        return $raporIsSet->catatan;
                    } else {
                        return '<span class="badge badge-warning">Belum Di Input</span>';
                    }
                })
                ->addColumn('action', function ($row) use($kelas) {
                    $link = '<a href="'.route('guru.input-catatan.show', ['kelas_id' => $kelas->id, 'murid_id' => $row->siswa->id]).'" class="btn btn-success">Input/Edit Catatan</a>';

                    return $link;
                })
                ->rawColumns(['eskul', 'nilai_eskul', 'catatan', 'action'])
                ->make(true);
        }

        return view('_guru.kelas.show', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
