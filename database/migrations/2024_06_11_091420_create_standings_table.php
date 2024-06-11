<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('team_id');
            $table->integer('rank')->nullable(); 
            $table->integer('win')->default(0);
            $table->integer('lose')->default(0);
            $table->integer('wr')->default(0);
            $table->timestamps();

            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });

         // Create procedure to calculate rank
        DB::unprepared('
        CREATE PROCEDURE GetStandingsRanking(IN tournamentId INT)
        BEGIN
            SELECT s.*,
                t.name AS team_name,  
                (s.win + s.lose) AS total_matches,
                (s.win / NULLIF(s.win + s.lose, 0) * 100) AS win_rate,
                RANK() OVER (ORDER BY (s.win + s.lose) DESC, (s.win / NULLIF(s.win + s.lose, 0)) DESC, s.id ASC) AS ranking
            FROM standings s
            JOIN teams t ON s.team_id = t.id  
            WHERE s.tournament_id = tournamentId;
        END
        ');

    }



    public function down(): void
    {
        // Drop trigger, procedure, and view if the migration is rolled back
        DB::unprepared('DROP PROCEDURE IF EXISTS GetStandingsRanking');
        Schema::dropIfExists('standings');
    }
};