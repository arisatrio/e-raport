<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\MTahunAjaran;
use App\Models\MKelas;
use App\Models\User;
use App\Models\MJurusan;
use App\Models\KKelas;
use App\Models\KKelasSiswa;

class KKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ta     = MTahunAjaran::all(); 
        $guru   = User::where('role_id', 3)->get();
        $jurusan    = MJurusan::all();

        if($request->ajax()) {
            $data = KKelas::with('tahunAjaran', 'waliKelas', 'jurusan')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tahun_ajaran', function ($row) {
                    return $row->tahunAjaran->tahun_ajaran;
                })
                ->addColumn('kelas', function ($row) {
                    return $row->tingkat.' - '.$row->jurusan->jurusan.' / '.$row->ruangan;
                })
                ->addColumn('wali_kelas', function ($row) {
                    return $row->walikelas->name;
                })
                ->addColumn('action', function ($row) {
                    $show = '<a href="'.route('admin.kelas-siswa.show', $row->id).'" class="btn btn-info bg-kaneza mr-1" ><i class="mdi mdi-account-plus"></i> Tambah Siswa</a>';
                    $edit = '<a href="'.route('admin.kelas-siswa.edit', $row->id).'" class="btn btn-warning mr-1"><i class="fas fa-pencil-alt"></i></a>';
                    $delete = '<button class="btn btn-danger" id="btn-delete" data-id="'.$row->id.'"><i class="fas fa-trash"></i></button>';
                    
                    return $show.$edit.$delete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('_admin.KKelas.index', compact('ta', 'guru', 'jurusan'));
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
            'ta_id'                 => 'required',
            'wali_kelas_id'         => 'required',
            'm_jurusan_id'         => 'required',
            'tingkat'               => 'required',
            'ruangan'               => 'required',
        ]);

        KKelas::create([
            'm_tahun_ajaran_id'     => $request->ta_id,
            'm_jurusan_id'          => $request->m_jurusan_id,
            'wali_kelas_id'         => $request->wali_kelas_id,
            'tingkat'               => $request->tingkat,
            'ruangan'               => $request->ruangan,
        ]);
        
        return redirect()->route('admin.kelas-siswa.index')->with('messages', 'Data Kelas Siswa berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = KKelas::with('jurusan', 'tahunAjaran', 'siswaKelas', 'siswaKelas.siswa')->find($id);
        $allSiswa = User::where('role_id', 4)->whereDoesntHave('kelasSiswa', function ($q) use($kelas) {
            $q->where('k_kelas_id', $kelas->id);
        })->get();
        $siswaKelas = KKelasSiswa::with('siswa')->where('k_kelas_id', $kelas->id)->get();

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
        $kelas      = KKelas::find($id);
        $ta         = MTahunAjaran::all(); 
        $guru       = User::where('role_id', 3)->get();
        $jurusan    = MJurusan::all();

        return view('_admin.KKelas.edit', compact('kelas', 'ta', 'guru', 'jurusan'));
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
            'ta_id'                 => 'required',
            'wali_kelas_id'         => 'required',
            'm_jurusan_id'         => 'required',
            'tingkat'               => 'required',
            'ruangan'               => 'required',
        ]);

        $kelas = KKelas::find($id);
        $kelas->update([
            'm_tahun_ajaran_id'     => $request->ta_id,
            'm_jurusan_id'          => $request->m_jurusan_id,
            'wali_kelas_id'         => $request->wali_kelas_id,
            'tingkat'               => $request->tingkat,
            'ruangan'               => $request->ruangan,
        ]);

        return redirect()->route('admin.kelas-siswa.index')->with('messages', 'Data Kelas Siswa berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = KKelas::find($id);
        $kelas->siswaKelas()->delete();
        $kelas->delete();

        return redirect()->route('admin.kelas-siswa.index')->with('messages', 'Data Kelas Siswa berhasil dihapus');
    }
}
