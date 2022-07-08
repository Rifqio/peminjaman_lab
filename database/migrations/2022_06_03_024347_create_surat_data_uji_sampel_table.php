<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_data_uji_sampel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->bigInteger('no_surat');
            $table->string('no_pembayaran');
            $table->string('nama_analisa');
            $table->string('nama_sampel');
            $table->integer('jumlah_sampel');
            $table->date('tanggal_masuk');
            $table->date('tanggal_selesai');
            $table->string('catatan');
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
        Schema::dropIfExists('data_uji_sampel');
    }
};
