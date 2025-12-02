<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';
    protected $primaryKey = 'id_pengembalian';
    public $timestamps = true;

    protected $fillable = [
        'id_pinjam',
        'tanggal_pengembalian',
    ];

    public function detailPeminjaman()
    {
        return $this->belongsTo(detail_peminjaman::class, 'id_pinjam', 'id_pinjam');
    }
}