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
        Schema::create('surat_permohonan_bebas_lab', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_mahasiswa_id')->constrained('user_mahasiswa');
            $table->int('no_surat');
            $table->string('keterangan');
            $table->text('judul');
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
        Schema::dropIfExists('bebas_lab');
    }
};
