<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MTahunAjaran;
use App\Models\MKelas;
use App\Models\User;

class KKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ta     = MTahunAjaran::where('status', 1)->get();
        $kelas  = MKelas::with('jurusan', 'waliKelas')->get();
        $guru   = User::where('role_id', 3)->get();

        return view('_admin.KKelas.index', compact('ta', 'kelas', 'guru'));
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
            'ta'            => 'required',
            'm_kelas_id'    => 'required',
            'user_id'      => 'required',
        ]);
        $kelas = MKelas::with('jurusan')->find($request->m_kelas_id);
        $guru  = User::find($request->user_id);

        $username = $kelas->tingkat.'-'.$kelas->jurusan->kode_jurusan.'-'.$kelas->ruangan.'-'.$request->ta;

        if(!$kelas->waliKelas->contains($guru)){
            User::create([
                'role_id'   => 2,
                'name'      => 'Wali Kelas '.str_replace('-', ' ', $username),
                'username'  => strtolower($username),
                'email'     => 'walas'.$kelas->id.'@mail.com',
                'password'  => bcrypt('@123456'),
            ]);
            $kelas->waliKelas()->attach($guru, ['ta' => $request->ta]);
            return redirect()->route('admin.kelas-siswa.index')->with('messages', 'Data Kelas Siswa berhasil disimpan');
        } else {
            return redirect()->route('admin.kelas-siswa.index')->with('error', 'Data Kelas Siswa dan Wali Kelas sudah ada');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = MKelas::find($id);
        $allSiswa = User::where('role_id', 4)->get();
        $siswaKelas = MKelas::with('siswaKelas')->get();

        return view('_admin.KKelas.show', compact('kelas', 'allSiswa', 'siswaKelas'));
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
