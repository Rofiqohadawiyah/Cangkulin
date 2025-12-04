<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokTani extends Model
{
    use HasFactory;

    protected $table = 'kelompok_tani';
    protected $primaryKey = 'id_kelompoktani';
    protected $fillable = [
        'nama_kelompoktani',
        'jumlah_kelompoktani',
        'no_hp_kelompoktani',
        'nik',
        'deskripsi_jalan',
        'id_alamat',
        'is_active',
    ];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'id_alamat', 'id_alamat');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_kelompoktani', 'id_kelompoktani');
    }
}
