<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipes', function (Blueprint $table) {
            $table->id();
            $table->string('nopol');
            $table->string('nama_tipe');
            $table->string('merk');
            $table->string('jenis');
            $table->string('model');
            $table->string('tahun_buat');
            $table->string('besar_cc');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->string('warna');
            $table->string('bahan_bakar');
            $table->string('kepentingan');
            $table->date('tgl_daftar');
            $table->date('tgl_cetak');
            $table->date('tgl_mslaku');
            $table->string('pemohon');
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
        Schema::dropIfExists('tipes');
    }
}
