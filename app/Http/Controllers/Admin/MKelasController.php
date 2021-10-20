<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MKelas;
use App\Models\MTahunAjaran;
use App\Models\MJurusan;

class MKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas      = MKelas::with('tahunAjaran', 'jurusan')->get();
        $ta         = MTahunAjaran::all();
        $jurusan    = MJurusan::all();

        return view('_admin.MKelas.index', compact('kelas', 'ta', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'm_tahun_ajarans_id'    => 'required',
            'm_jurusans_id'         => 'required',
            'kelas'                 => 'required',
        ]);
        MKelas::create($data);

        return redirect()->route('admin.kelas.index')->with('messages', 'Data Kelas berhasil disimpan');
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
        $data = $this->validate($request, [
            'm_tahun_ajarans_id'    => 'required',
            'm_jurusans_id'         => 'required',
            'kelas'                 => 'required',
        ]);
        $kelas = MKelas::find($id);
        $kelas->update($data);

        return redirect()->route('admin.kelas.index')->with('messages', 'Data Kelas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = MKelas::find($id);
        $kelas->delete();

        return redirect()->route('admin.kelas.index')->with('messages', 'Data Kelas berhasil dihapus');
    }
}
