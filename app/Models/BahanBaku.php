<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahan_baku';
    protected $primaryKey = 'id_bahan_baku';
    protected $fillable = ['id_bahan_baku', 'id_supplier', 'nama_bahan', 'keterangan', 'harga_beli', 'jumlah_bahan', 'tgl_masuk'];
}
