<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koleksi;

class KatalogController extends Controller
{
    public function index()
    {
        $koleksi = Koleksi::all();
        return view('Katalog.index' ,compact('koleksi'));
    }
}
