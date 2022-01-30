<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\MTahunAjaran;
use App\Models\User;
use App\Models\KKelas;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ta = MTahunAjaran::all();
        $kelas = KKelas::with('jurusan')->get();


        if($request->ajax()) {
            $data = User::whereHas('kelasSiswa')->where('role_id', 4)->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('kelas', function ($row) {
                    return 'X MM / Satu';
                })
                ->addColumn('nilai', function ($row) {
                    return '<span class="badge badge-secondary">80</span>';
                })
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus fa-fw"></i>Tambah Nilai</button>';
                })
                ->rawColumns(['nilai', 'action'])
                ->make(true);
        }

        return view('_guru.input-nilai', compact('ta', 'kelas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
