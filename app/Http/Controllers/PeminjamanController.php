<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use App\Models\Peminjaman;


class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $koleksi = Koleksi::all();
        $anggota = Anggota::all();

        return view('peminjaman.create', compact('koleksi', 'anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_koleksi' => 'required|exists:koleksi,id_koleksi',
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil ditambahkan');
    }
    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);
        $koleksi = Koleksi::all();
        $anggota = Anggota::all();

        return view('peminjaman.edit', compact('peminjaman', 'koleksi', 'anggota'));
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);

        $peminjaman->update([
            'id_koleksi' => $request->id_koleksi,
            'id_anggota' => $request->id_anggota,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil diupdate');
    }
}
