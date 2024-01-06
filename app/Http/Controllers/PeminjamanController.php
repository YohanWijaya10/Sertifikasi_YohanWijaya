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
        // Mengambil semua data peminjaman dari database
        $peminjaman = Peminjaman::all();

        // Menampilkan halaman indeks peminjaman dengan daftar peminjaman
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        // Mengambil semua data koleksi dan anggota dari database
        $koleksi = Koleksi::all();
        $anggota = Anggota::all();

        // Menampilkan halaman form untuk membuat peminjaman baru
        return view('peminjaman.create', compact('koleksi', 'anggota'));
    }

    public function store(Request $request)
    {
       // Validasi input dari form peminjaman
       $request->validate([
        'id_koleksi' => 'required|exists:koleksi,id_koleksi',
        'id_anggota' => 'required|exists:anggota,id_anggota',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam|before_or_equal:' . now()->addDays(7)->toDateString(),
        'status_pengembalian' => 'required'
    ]);

    // Mengurangi jumlah copy koleksi setelah peminjaman
    $koleksi = Koleksi::find($request->id_koleksi);
    $koleksi->decrement('jumlah_kopi');

    // Menyimpan data peminjaman ke dalam database
    Peminjaman::create($request->all());

    // Mengarahkan kembali ke halaman indeks peminjaman dengan pesan sukses
    return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil ditambahkan');
    }


    
    public function edit($id)
    {
        // Mengambil data peminjaman berdasarkan ID untuk diedit
        $peminjaman = Peminjaman::find($id);

        // Mengambil semua data koleksi dan anggota dari database
        $koleksi = Koleksi::all();
        $anggota = Anggota::all();

        // Menampilkan halaman form edit dengan data peminjaman, koleksi, dan anggota
        return view('peminjaman.edit', compact('peminjaman', 'koleksi', 'anggota'));
    }

    public function update(Request $request, $id)
    {
       // Mengambil data peminjaman berdasarkan ID untuk diupdate
       $peminjaman = Peminjaman::find($id);

       // Mengupdate data peminjaman berdasarkan input dari form edit
       $peminjaman->update([
           'id_koleksi' => $request->id_koleksi,
           'id_anggota' => $request->id_anggota,
           'tanggal_pinjam' => $request->tanggal_pinjam,
           'tanggal_kembali' => $request->tanggal_kembali,
           'status_pengembalian' => $request->status_pengembalian,
       ]);

       // Mengarahkan kembali ke halaman indeks peminjaman dengan pesan sukses
       return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil diupdate');
   }
}
