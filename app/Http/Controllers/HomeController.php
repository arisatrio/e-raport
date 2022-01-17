<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MTahunAjaran;
use App\Models\MMapelJurusan;
use App\Models\MMapelUmum;

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

    public function homeMurid()
    {
        $ta = MTahunAjaran::where('status', 1)->first();
        $mapelJurusan = MMapelJurusan::where('tingkat', auth()->user()->siswaKelas->first()->tingkat)->get();
        $mapelUmum = MMapelUmum::all();

        $mapel = $mapelJurusan->concat($mapelUmum);

        return view('_murid.dashboard', compact('ta', 'mapel'));
    } 
}
