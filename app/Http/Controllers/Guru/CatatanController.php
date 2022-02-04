<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\KKelas;
use App\Models\RCatatan;

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
            'catatan'   => 'required',
        ]);

        RCatatan::updateOrCreate(['murid_id' => $request->murid_id, 'k_kelas_id' => $request->kelas_id],[
            'm_tahun_ajaran_id' => $request->ta_id,
            'k_kelas_id'        => $request->kelas_id,
            'murid_id'          => $request->murid_id,
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

        return view('_guru.kelas.create', compact('siswa', 'kelas'));
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
