<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registration_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['Individu', 'Tim']);
            $table->integer('jumlah_peserta')->nullable();
            $table->integer('jumlah_anggota_tim')->nullable();
            $table->date('batas_pendaftaran');
            $table->timestamps();
            $table->foreign('tournament_id')->references('id')->on('tournaments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_settings');
    }
};
