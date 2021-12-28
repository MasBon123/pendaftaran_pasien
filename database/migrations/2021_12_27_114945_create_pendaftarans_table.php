<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->bigInteger('keluhan')->unsigned();
            $table->foreign('keluhan')->references('id')
                ->on('keluhans')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('tanggal_daftar');
            $table->string('no_telepon');
            $table->string('nama_dokter');
            $table->string('jk');
            $table->date('jadwal_periksa');
            $table->bigInteger('ruang')->unsigned();
            $table->foreign('ruang')->references('id')
                ->on('ruangs')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('cara_bayar');
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
        Schema::dropIfExists('pendaftarans');
    }
}
