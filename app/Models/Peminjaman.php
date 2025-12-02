<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id_pinjam';
    protected $fillable = [
        'tanggal_pinjam',
        'tenggat_pinjam',
        'id_kelompoktani',
        'id_admin',
        'id_status'
    ];

  public function kelompokTani()
{
    return $this->belongsTo(KelompokTani::class, 'id_kelompoktani');
}

public function admin()
{
    return $this->belongsTo(Admin::class, 'id_admin');
}

public function status()
{
    return $this->belongsTo(Status::class, 'id_status');
}

public function detailPeminjaman()
{
    return $this->hasMany(DetailPeminjaman::class, 'id_pinjam', 'id_pinjam');
}

}