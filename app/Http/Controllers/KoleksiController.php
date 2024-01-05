<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koleksi;

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksi = Koleksi::all();
        return view('koleksi.index', compact('koleksi'));
    }

}
