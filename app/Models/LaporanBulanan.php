<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBulanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan',
        'tahun',
        'total_barang_masuk',
        'total_barang_keluar',
        'tanggal_dibuat',
        'dibuat_oleh',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
