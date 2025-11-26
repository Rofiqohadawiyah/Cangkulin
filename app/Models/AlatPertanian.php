<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlatPertanian extends Model
{
    protected $table = 'alat_pertanian'; // tabel database

    protected $primaryKey = 'id_alat';

    public $timestamps = false;

    protected $fillable = [
        'nama_alat',
        'jumlah',
        'gambar_alat',
        'is_active'
    ];
}
