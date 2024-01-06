<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanAdminController extends Controller
{
    public function index()
    {
         // Mengambil semua data peminjaman dari database
         $peminjaman = Peminjaman::all();

         // Menampilkan halaman indeks admin peminjaman dengan daftar peminjaman
         return view('AdminPeminjaman.index', ["active_peminjaman" => "active"], compact('peminjaman'));
    }

    public function create()
    {
           // Mengambil semua data koleksi dan anggota dari database
           $koleksi = Koleksi::all();
           $anggota = Anggota::all();
   
           // Menampilkan halaman form untuk membuat peminjaman baru
           return view('AdminPeminjaman.create', compact('koleksi', 'anggota'));
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

    // Mengarahkan kembali ke halaman indeks admin peminjaman dengan pesan sukses
    return redirect()->route('AdminPeminjaman.index')->with('success', 'Data Peminjaman berhasil ditambahkan');
    }

    public function edit($id)
    {
       // Mengambil data peminjaman berdasarkan ID untuk diedit
        $peminjaman = Peminjaman::find($id);

        // Mengambil semua data koleksi dan anggota dari database
        $koleksi = Koleksi::all();
        $anggota = Anggota::all();

        // Menampilkan halaman form edit dengan data peminjaman, koleksi, dan anggota
        return view('AdminPeminjaman.edit', compact('peminjaman', 'koleksi', 'anggota'));
        return view('AdminPeminjaman.edit', compact('peminjaman', 'koleksi', 'anggota'));
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
  
          // Jika status_pengembalian == 1, tambahkan jumlah copy koleksi
          if ($request->status_pengembalian == '1') {
              $koleksi = Koleksi::find($request->id_koleksi);
              $koleksi->increment('jumlah_kopi');
          }
  
          // Mengarahkan kembali ke halaman indeks peminjaman dengan pesan sukses
          return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil diupdate');
      }
}