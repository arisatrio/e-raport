<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MJurusan;

class MJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = MJurusan::all();

        return view('_admin.MJurusan.index', compact('jurusan'));
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
            'jurusan'   => 'required',
            'kode_jurusan'  => 'required',
        ]);
        MJurusan::create($data);

        return redirect()->route('admin.jurusan.index')->with('messages', 'Data Jurusan berhasil disimpan');
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
            'jurusan'   => 'required',
            'kode_jurusan'  => 'required',
        ]);
        $jurusan = MJurusan::find($id);
        $jurusan->update($data);

        return redirect()->route('admin.jurusan.index')->with('messages', 'Data Jurusan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = MJurusan::find($id);
        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('messages', 'Data Jurusan berhasil dihapus');        
    }
}
