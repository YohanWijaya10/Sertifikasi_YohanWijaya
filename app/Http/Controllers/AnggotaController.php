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

    public function edit($id)
    {
        $anggota = Anggota::find($id);

        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)

    {
        $anggota = Anggota::find($id);

        $anggota->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil diupdate');
    }
    public function destroy($id)
{
    $anggota = Anggota::find($id);
    $anggota->delete();

    return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil dihapus');
}


    

}
