<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StokProduksi extends Model
{
    use HasFactory;

    protected $table = 'stok_produksi';
    protected $primaryKey = 'id_stok_produksi';
    protected $fillable = ['id_stok_produksi', 'id_produksi', 'jumlah_stok'];
}
