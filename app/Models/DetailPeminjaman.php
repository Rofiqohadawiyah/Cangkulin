<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'id_alat',
        'id_pinjam',
        'jumlah'
    ];

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'id_pinjam', 'id_pinjam');
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_pinjam', 'id_pinjam');
    }

    public function alat()
    {
        return $this->belongsTo(AlatPertanian::class, 'id_alat', 'id_alat');
    }
}