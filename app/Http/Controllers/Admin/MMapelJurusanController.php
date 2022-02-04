<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MMapelJurusan;
use App\Models\MMapel;
use App\Models\MJurusan;
use App\Models\User;

class MMapelJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = MJurusan::all();
        $mapel = MMapel::with('guru')->whereHas('mapelJurusan')->get();
        $guru = User::where('role_id', 3)->get();

        return view('_admin.MMapelJurusan.index', compact('jurusan', 'mapel', 'guru'));
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
            'm_jurusan_id' => 'required',
            'guru_id'   => 'required',
            'golongan'  => 'required',
            'mapel'     => 'required',
            'tingkat'   => 'required',
            'kkm'       => 'required|numeric',
        ]);
        MMapel::create($data);

        return redirect()->route('admin.mapel-jurusan.index')->with('messages', 'Data Mata Pelajaran Jurusan berhasil disimpan');
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
            'm_jurusan_id' => 'required',
            'golongan'  => 'required',
            'mapel'     => 'required',
            'tingkat'   => 'required',
            'kkm'       => 'required|numeric',
        ]);
        $mapel = MMapel::find($id);
        $mapel->update($data);

        return redirect()->route('admin.mapel-jurusan.index')->with('messages', 'Data Mata Pelajaran Jurusan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = MMapel::find($id);
        $mapel->delete();

        return redirect()->route('admin.mapel-jurusan.index')->with('messages', 'Data Mata Pelajaran Jurusan berhasil dihapus');
    }
}
