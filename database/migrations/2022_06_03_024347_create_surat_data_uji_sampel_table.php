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
            $table->integer('no_surat');
            $table->string('nama_analisa');
            $table->string('nama_sampel');
            $table->integer('jumlah_sampel');
            $table->date('tanggal_masuk');
            $table->date('tanggal_selesai');
            $table->string('catatan');
            $table->foreignId('status_pembayaran')->constrained('status_pembayaran');
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
