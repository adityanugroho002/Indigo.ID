<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PencariController extends Controller
{
    public function index()
    {
        return view('pencari.dashboard');
    }
}

