<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Pinjaman::all();
        return view('peminjaman.index', compact('peminjaman'));
    }

    // Metode lain sesuai kebutuhan, seperti create, store, edit, update, destroy, dll.
}
