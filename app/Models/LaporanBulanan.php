<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBulanan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_laporan';

    public function user()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }
}
