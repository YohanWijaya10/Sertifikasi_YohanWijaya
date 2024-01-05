<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;

    protected $table = 'koleksi';

    protected $primaryKey = 'id_koleksi';

    protected $fillable = [
        'judul',
        'pengarang',
        'tahun_terbit',
        'jumlah_kopi',
    ];
    
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'id_koleksi', 'id_koleksi');
    }

  
}
