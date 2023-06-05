<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGudangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudang', function (Blueprint $table) {
            $table->id('id_gudang');
            $table->integer('id_barang');
            $table->integer('id_pegawai');
            $table->string('nama_gudang');
            $table->text('alamat');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->bigInteger('kapasitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gudang');
    }
}
