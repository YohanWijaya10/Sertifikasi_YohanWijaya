<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koleksi;

class KoleksiController extends Controller
{
    public function index()
    {
         // Mengambil semua data koleksi dari database
         $koleksi = Koleksi::all();

         // Menampilkan halaman indeks koleksi dengan daftar koleksi
         return view('koleksi.index', ["active_koleksi" => "active"], compact('koleksi'));
    }

    public function create()
    {
        // Menampilkan halaman form untuk membuat koleksi baru
        return view('koleksi.create');
    }

    public function store(Request $request)
    {
         // Mengambil file gambar dari request
         $file = $request->file;
         $filename = $file ? $file->getClientOriginalName() : null;
 
         // Membuat dan menyimpan data koleksi baru ke dalam database
         Koleksi::create([
             'judul' => $request->judul,
             'pengarang' => $request->pengarang,
             'tahun_terbit' => $request->tahun_terbit,
             'jumlah_kopi' => $request->jumlah_kopi,
             'gambar' => $filename,
         ]);
 
         // Jika terdapat file gambar, pindahkan ke direktori 'assets/'
         if ($file) {
             $request->file->move('assets/', $filename);
         }
 
         // Mengarahkan kembali ke halaman indeks koleksi dengan pesan sukses
         return redirect()->route('koleksi.index')->with('success', 'Data Koleksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Mengambil data koleksi berdasarkan ID untuk diedit
        $koleksi = Koleksi::findOrFail($id);

        // Menampilkan halaman form edit dengan data koleksi
        return view('koleksi.edit', compact('koleksi'));
    }

    public function update(Request $request, $id)
    {
         // Mengambil file gambar dari request
         $file = $request->file;
         $filename = $file ? $file->getClientOriginalName() : null;
 
         // Mengambil data koleksi berdasarkan ID untuk diupdate
         $koleksi = Koleksi::findOrFail($id);
 
         // Mengupdate data koleksi berdasarkan input dari form edit
         $koleksi->update([
             'judul' => $request->judul,
             'pengarang' => $request->pengarang,
             'tahun_terbit' => $request->tahun_terbit,
             'jumlah_kopi' => $request->jumlah_kopi,
             'gambar' => $filename,
         ]);
 
         // Jika terdapat file gambar, pindahkan ke direktori 'assets/'
         if ($file) {
             $request->file->move('assets/', $filename);
         }
 
         // Mengarahkan kembali ke halaman indeks koleksi dengan pesan sukses
         return redirect()->route('koleksi.index')->with('success', 'Data Koleksi berhasil diupdate');
    }

    public function destroy($id)
    {
         // Mengambil data koleksi berdasarkan ID untuk dihapus
         $koleksi = Koleksi::find($id);

         // Menghapus data koleksi dari database
         $koleksi->delete();
 
         // Mengarahkan kembali ke halaman indeks koleksi dengan pesan sukses
         return redirect()->route('koleksi.index')->with('success', 'Data Koleksi berhasil dihapus');
    }
}
