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
        //membuat tabel tournaments otomatis
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade');
            $table->string('nama');
            $table->string('url')->unique();
            $table->date('jadwal_mulai');
            $table->date('jadwal_selesai');
            $table->text('deskripsi')->nullable();
            $table->enum('tipe', ['Online', 'Offline']);
            $table->string('alamat')->nullable();
            $table->text('hadiah')->nullable();
            $table->text('rules')->nullable();
            $table->integer('fee')->nullable();
            $table->string('url_live')->nullable();
            $table->string('format')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
