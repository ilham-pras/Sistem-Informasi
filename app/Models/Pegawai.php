<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = ['id_pegawai', 'id_pengguna', 'nama_pegawai', 'jabatan', 'alamat', 'no_hp', 'email'];
}
