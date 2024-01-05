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

    public function create()
    {
        return view('koleksi.create');
    }

    public function store(Request $request)
    {

        Koleksi::create([
            'judul' => $request-> judul,
            'pengarang' => $request-> pengarang,
            'tahun_terbit' => $request-> tahun_terbit,
            'jumlah_kopi' => $request-> jumlah_kopi
            

            
            
        ]);
       


        return redirect()->route('koleksi.index')->with('success', 'Data Koleksi berhasil ditambahkan');
    }
}
