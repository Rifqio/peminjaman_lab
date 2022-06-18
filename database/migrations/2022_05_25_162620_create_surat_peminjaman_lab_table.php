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
        Schema::create('surat_peminjaman_lab', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no_surat');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('ruang_lab_id')->constrained('ruang_lab');
            $table->text('judul_penelitian');
            $table->foreignId('sumber_dana_id')->constrained('sumber_dana_peminjaman');
            $table->string('pembimbing');
            $table->foreignId('tujuan_akses_id')->constrained('tujuan_akses_lab');
            $table->date('tanggal_awal_peminjaman');
            $table->date('tanggal_akhir_peminjaman');
            $table->foreignId('status_id')->constrained('status_aktivasi');
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
        Schema::dropIfExists('requests');
    }
};
