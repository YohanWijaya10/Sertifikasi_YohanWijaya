<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable',
            'nomor_telepon' => 'nullable',
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil ditambahkan');
    }
}
