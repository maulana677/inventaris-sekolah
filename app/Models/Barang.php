<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'deskripsi',
        'kategori_id',
        'lokasi_id',
        'jumlah',
        'tanggal_masuk',
        'kondisi',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function riwayatStok()
    {
        return $this->hasMany(RiwayatStok::class);
    }

    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
