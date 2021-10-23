<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MEskul;

class MEskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eskul = MEskul::all();

        return view('_admin.MEskul.index', compact('eskul'));
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
            'nama_eskul'    => 'required',
        ]);
        MEskul::create($data);

        return redirect()->route('admin.ekstrakulikuler.index')->with('messages', 'Data Ekstrakulikuler berhasil disimpan');
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
            'nama_eskul'    => 'required',
        ]);
        $eskul = MEskul::find($id);
        $eskul->update($data);

        return redirect()->route('admin.ekstrakulikuler.index')->with('messages', 'Data Ekstrakulikuler berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eskul = MEskul::find($id);
        $eskul->delete();

        return redirect()->route('admin.ekstrakulikuler.index')->with('messages', 'Data Ekstrakulikuler berhasil dihapus');
    }
}
