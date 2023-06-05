<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlet';
    protected $primaryKey = 'id_outlet';
    protected $fillable = ['id_outlet', 'id_gudang', 'nama_outlet', 'alamat', 'email', 'jumlah_stok'];
}
