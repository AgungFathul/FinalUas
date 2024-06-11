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
        DB::unprepared('
            CREATE FUNCTION calculate_win_rate(win INT, lose INT) RETURNS INT(10)
            DETERMINISTIC
            BEGIN
                DECLARE win_rate INT(10);
                IF (win + lose) > 0 THEN
                    SET win_rate = (win / (win + lose)) * 100;
                ELSE
                    SET win_rate = 0;
                END IF;
                RETURN win_rate;
            END;
        ');

        DB::unprepared('
            CREATE TRIGGER update_win_rate BEFORE UPDATE ON standings
            FOR EACH ROW
            BEGIN
                SET NEW.wr = calculate_win_rate(NEW.win, NEW.lose);
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_win_rate');
        DB::unprepared('DROP FUNCTION IF EXISTS calculate_win_rate');
    }
};