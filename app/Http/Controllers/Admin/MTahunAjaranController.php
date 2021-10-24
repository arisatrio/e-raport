<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MTahunAjaran;

class MTahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ta = MTahunAjaran::all();

        return view('_admin.MTahunAjaran.index', compact('ta'));
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
            'tahun_ajaran'  => 'required',
            'semester'      => 'required',
            'status'        => 'required',
        ]);
        MTahunAjaran::create($data);

        return redirect()->route('admin.tahun-ajaran.index')->with('messages', 'Data Tahun Ajaran berhasil disimpan');
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
            'tahun_ajaran'  => 'required',
            'semester'      => 'required',
            'status'        => 'required',
        ]);
        $ta = MTahunAjaran::find($id);
        $ta->update($data);

        return redirect()->route('admin.tahun-ajaran.index')->with('messages', 'Data Tahun Ajaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ta = MTahunAjaran::find($id);
        $ta->delete();

        return redirect()->route('admin.tahun-ajaran.index')->with('messages', 'Data Tahun Ajaran berhasil dihapus');
    }
}