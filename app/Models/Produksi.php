<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'produksi';
    protected $primaryKey = 'id_produksi';
    protected $fillable = ['id_produksi', 'tgl_produksi', 'nama_barang', 'jmlh_bahan', 'jmlh_tenaga', 'jmlh_produksi', 'status'];
}
