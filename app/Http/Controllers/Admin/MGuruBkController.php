<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class MGuruBkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $guru = User::where('role_id', 5)->get();

        return view('_admin.MGuruBk.index', compact('guru'));
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
            'name'      => 'required',
            'username'  => 'required|unique:users,username',
            'email'     => 'required|unique:users,email',
            'nohp'      => 'required',
        ]);
        User::create([
            'role_id'   => 5,
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => bcrypt('@123456'),
            'nohp'      => $request->nohp,
        ]);

        return redirect()->route('admin.guru-bk.index')->with('messages', 'Data Guru BK berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = User::find($id);

        return view('_admin.MGuruBk.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = User::find($id);

        return view('_admin.MGuruBk.edit', compact('guru'));
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
        $this->validate($request, [
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required',
            'nohp'      => 'required',
        ]);

        $guru = User::find($id);
        $guru->update([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'nohp'      => $request->nohp,
            'alamat'    => $request->alamat,
        ]);

        return redirect()->route('admin.guru-bk.index')->with('messages', 'Data Guru berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = User::find($id);
        $guru->delete();

        return redirect()->route('admin.guru-bk.index')->with('messages', 'Data Guru berhasil dihapus');
    }
}
