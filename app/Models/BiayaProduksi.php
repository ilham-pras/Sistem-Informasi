<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BiayaProduksi extends Model
{
    use HasFactory;

    protected $table = 'biaya_produksi';
    protected $primaryKey = 'id_biaya_produksi';
    protected $fillable = ['id_biaya_produksi', 'id_produksi', 'biaya_bahan_baku', 'biaya_tenaga_kerja', 'biaya_overhead', 'total_biaya_produksi'];
}
