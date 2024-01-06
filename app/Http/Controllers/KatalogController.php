<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koleksi;

class KatalogController extends Controller
{
    public function index()
    {
        // Mengambil semua data koleksi dari database
        $koleksi = Koleksi::all();

        // Menampilkan halaman indeks katalog dengan daftar koleksi
        return view('Katalog.index', compact('koleksi'));
    }
}
