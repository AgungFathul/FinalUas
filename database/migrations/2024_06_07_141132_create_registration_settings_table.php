<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registration_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id');
            $table->string('jenis')->default('Tim');
            $table->integer('jumlah_peserta')->nullable();
            $table->integer('jumlah_anggota_tim')->nullable();
            $table->date('batas_pendaftaran');
            $table->timestamps();
            $table->foreign('tournament_id')->references('id')->on('tournaments');
        });
    }

    public function down()
    {
        Schema::dropIfExists('registration_settings');
    }
};