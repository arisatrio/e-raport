<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MMapelUmum;
use App\Models\User;

class MMapelUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = MMapelUmum::with('guru')->get();
        $guru = User::where('role_id', 3)->get();

        return view('_admin.MMapelUmum.index', compact('mapel', 'guru'));
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
            'guru_id'   => 'required',
            'golongan'  => 'required',
            'mapel'     => 'required',
            'kkm'       => 'required|numeric',
        ]);
        MMapelUmum::create($data);

        return redirect()->route('admin.mapel-umum.index')->with('messages', 'Data Mata Pelajaran Umum berhasil disimpan');
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
            'golongan'  => 'required',
            'mapel'     => 'required',
            'kkm'       => 'required|numeric',
        ]);
        $mapel = MMapelUmum::find($id);
        $mapel->update($data);

        return redirect()->route('admin.mapel-umum.index')->with('messages', 'Data Mata Pelajaran Umum berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = MMapelUmum::find($id);
        $mapel->delete();

        return redirect()->route('admin.mapel-umum.index')->with('messages', 'Data Mata Pelajaran Umum berhasil dihapus');
    }
}
