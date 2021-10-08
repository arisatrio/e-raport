<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('_murid.dashboard');
    } 
}
