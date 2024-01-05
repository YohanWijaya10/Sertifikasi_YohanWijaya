<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_koleksi',
        'id_anggota',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    // Tambahan relasi jika diperlukan
    // public function koleksi()
    // {
    //     return $this->belongsTo(Koleksi::class, 'id_koleksi', 'id_koleksi');
    // }

    // public function anggota()
    // {
    //     return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    // }
}
