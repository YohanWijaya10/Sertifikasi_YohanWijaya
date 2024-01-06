<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    

    public function index() // Menampilkan semua data anggota
    {
        $anggota = Anggota::all(); // Mengambil semua data anggota dari database

        return view('anggota.index', ["active_anggota" => "active"] ,compact('anggota'));  // Menampilkan halaman indeks anggota dengan daftar anggota

    }
    

    public function create() // Menampilkan form untuk membuat anggota baru
    {
        return view('anggota.create'); // Menampilkan halaman form untuk membuat anggota baru
    }


    public function store(Request $request) // Menyimpan anggota baru ke dalam database
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable',
            'nomor_telepon' => 'nullable',
        ]); // Melakukan validasi input dari form

        Anggota::create($request->all());  // Membuat dan menyimpan data anggota baru ke dalam database


        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil ditambahkan');   // Mengarahkan kembali ke halaman indeks anggota dengan pesan sukses

    }




    public function edit($id)     // Menampilkan form untuk mengedit anggota
    {


         // Mengambil data anggota berdasarkan ID untuk diedit
         $anggota = Anggota::find($id);

         // Menampilkan halaman form edit dengan data anggota
         return view('anggota.edit', compact('anggota'));
    }



    // Mengupdate data anggota

    public function update(Request $request, $id)

    {
         // Mengambil data anggota berdasarkan ID untuk diupdate
         $anggota = Anggota::find($id);

         // Mengupdate data anggota berdasarkan input dari form edit
         $anggota->update([
             'nama' => $request->nama,
             'alamat' => $request->alamat,
             'nomor_telepon' => $request->nomor_telepon,
         ]);
 
         // Mengarahkan kembali ke halaman indeks anggota dengan pesan sukses
         return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil diupdate');
     }



    // Menghapus data anggota
    public function destroy($id)
    {
        // Mengambil data anggota berdasarkan ID untuk dihapus
        $anggota = Anggota::find($id);

        // Menghapus data anggota dari database
        $anggota->delete();

        // Mengarahkan kembali ke halaman indeks anggota dengan pesan sukses
        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil dihapus');
    }


    

}
