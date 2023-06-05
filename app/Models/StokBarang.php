<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StokBarang extends Model
{
    use HasFactory;

    protected $table = 'stok_barang';
    protected $primaryKey = 'id_stok_barang';
    protected $fillable = [ 'id_stok_barang', 'id_barang', 'jumlah_stok'];
}
