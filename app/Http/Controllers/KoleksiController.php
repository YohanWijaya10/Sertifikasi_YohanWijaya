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
        $file = $request->file;
        $filename = $file ? $file->getClientOriginalName() : null;
        Koleksi::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_kopi' => $request->jumlah_kopi,
            'gambar' => $filename,

        ]);
        if ($file) {
            $request->file->move('assets/', $filename);
        }



        return redirect()->route('koleksi.index')->with('success', 'Data Koleksi berhasil ditambahkan');
    }
    public function edit($id)
    {
        $koleksi = Koleksi::findOrFail($id);

        return view('koleksi.edit', compact('koleksi'));
    }

    public function update(Request $request, $id)
    {
        $file = $request->file;
        $filename = $file ? $file->getClientOriginalName() : null;

        $koleksi = Koleksi::findOrFail($id);

        $koleksi->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_kopi' => $request->jumlah_kopi,
            'gambar' => $filename,
        ]);

        if ($file) {
            $request->file->move('assets/', $filename);
        }

        return redirect()->route('koleksi.index')->with('success', 'Data Koleksi berhasil diupdate');
    }

    public function destroy($id)
    {
        $koleksi = Koleksi::find($id);
        $koleksi->delete();

        return redirect()->route('koleksi.index')->with('success', 'Data Anggota berhasil dihapus');
    }
}
