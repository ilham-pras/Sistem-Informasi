<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaProduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_produksi', function (Blueprint $table) {
            $table->id('id_biaya_produksi');
            $table->integer('id_produksi');
            $table->bigInteger('biaya_bahan_baku');
            $table->bigInteger('biaya_tenaga_kerja');
            $table->bigInteger('biaya_overhead');
            $table->bigInteger('total_biaya_produksi');
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
        Schema::dropIfExists('biaya_produksi');
    }
}
