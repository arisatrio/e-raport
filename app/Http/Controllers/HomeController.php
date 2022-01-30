<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MTahunAjaran;
use App\Models\MMapelJurusan;
use App\Models\MMapelUmum;
use App\Models\KKelas;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homeAdmin()
    {
        return view('_admin.dashboard');
    }

    public function homeWalas()
    {
        return view('_walas.dashboard');
    }

    public function homeGuru()
    {
        return view('_guru.dashboard');
    } 

    public function homeGuruBk()
    {
        return view('_guru-bk.dashboard');
    } 

    public function homeMurid()
    {
        $ta = MTahunAjaran::where('status', 1)->first();
        $mapelJurusan = MMapelJurusan::where('tingkat', auth()->user()->kelasSiswa->first()->tingkat)->get();
        $mapelUmum = MMapelUmum::all();

        $mapel = $mapelJurusan->concat($mapelUmum);

        $kelasSiswa = KKelas::whereHas('siswaKelas', function ($q) {
            $q->where('murid_id', auth()->user()->id);
        })->get();

        return view('_murid.dashboard', compact('ta', 'mapel', 'kelasSiswa'));
    } 
}
