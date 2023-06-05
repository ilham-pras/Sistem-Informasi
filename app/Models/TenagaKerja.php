<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    use HasFactory;

    protected $table = 'tenaga_kerja';
    protected $primaryKey = 'id_tenaga_kerja';
    protected $fillable = ['id_tenaga_kerja', 'id_pengguna', 'nama_tenaga_kerja', 'jabatan', 'alamat', 'no_hp', 'email'];
}
