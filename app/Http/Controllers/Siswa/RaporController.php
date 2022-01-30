<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MMapelUmum;
use App\Models\MMapelJurusan;
use App\Models\KKelas;
use App\Models\RAbsensi;

class RaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mapelUmum = MMapelUmum::all();
        // $mapelJurusan = MMapelJurusan::where('m_jurusan_id', auth()->user()->siswaKelas->first()->);

        $reqKelas = KKelas::with('jurusan', 'tahunAjaran', 'waliKelas', 'siswaKelas')->find($request->kelas_id);
        $rekapAbsensi = RAbsensi::where('k_kelas_id', $reqKelas->id)->where('murid_id', auth()->user()->id)->first();

        return view('_murid.rapor-show', compact('reqKelas', 'mapelUmum', 'rekapAbsensi'));
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
