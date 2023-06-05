<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gudang extends Model
{
    use HasFactory;

    protected $table = 'gudang';
    protected $primaryKey = 'id_gudang';
    protected $fillable = ['id_gudang', 'id_barang', 'nama_gudang', 'alamat', 'tgl_masuk', 'tgl_keluar', 'kapasitas'];
}
