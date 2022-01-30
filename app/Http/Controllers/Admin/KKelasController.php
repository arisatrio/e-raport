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
                    return $row->jurusan->jurusan;
                })
                ->addColumn('wali_kelas', function ($row) {
                    return $row->walikelas->name;
                })
                ->addColumn('action', function ($row) {
                    $show = '<a href="'.route('admin.kelas-siswa.show', $row->id).'" class="btn btn-info bg-kaneza" ><i class="mdi mdi-account-plus"></i> Tambah Siswa</a>';
                    $edit = '<button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button>';
                    $delete = '<button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fas fa-trash"></i></button>';
                    // `                                
                    // <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-detail-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                    // {{-- <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{ $item->id }}"><i class="fas fa-pencil-alt"></i></button> --}}
                    // <a href="{{ route('admin.kelas-siswa.show', $item->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                    // <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fas fa-trash"></i></button>`;
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
        $allSiswa = User::where('role_id', 4)->get();
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
