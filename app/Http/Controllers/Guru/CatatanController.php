<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\KKelas;
use App\Models\RCatatan;
use App\Models\MEskul;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'eskul_id'  => 'required',
            'nilai_eskul'   => 'required',
            'catatan'   => 'required',
        ]);

        $nilai_eskul = $this->convertNilaiPredikat($request->nilai_eskul);

        RCatatan::updateOrCreate(['murid_id' => $request->murid_id, 'k_kelas_id' => $request->kelas_id],[
            'm_tahun_ajaran_id' => $request->ta_id,
            'k_kelas_id'        => $request->kelas_id,
            'murid_id'          => $request->murid_id,
            'eskul_id'          => $request->eskul_id,
            'nilai_eskul'       => $nilai_eskul,
            'catatan'           => $request->catatan,
        ]);

        return redirect('/guru/kelas-saya/create?kelas_id='.$request->kelas_id)->with('messages', 'Data Absensi berhasil disimpan');
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
        $eskul = MEskul::all();

        return view('_guru.kelas.create', compact('siswa', 'kelas', 'eskul'));
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
}
