<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Lomba;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $beasiswa = Beasiswa::all(); // Pastikan Anda memiliki model Beasiswa dan tabel yang sesuai di database
        $lomba = Lomba::all(); // Sama seperti di atas untuk Lomba

        return view('welcome', compact('beasiswa', 'lomba'));
    }
}
