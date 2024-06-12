<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        // Create the stored procedure
        DB::unprepared('
            CREATE PROCEDURE win_lose_validation(IN win INT, IN lose INT)
            BEGIN
                DECLARE error_message VARCHAR(255);

                START TRANSACTION;

                IF win < 0 OR lose < 0 THEN
                    SET error_message = "Win and lose must be non-negative.";
                    SIGNAL SQLSTATE "HY000" SET MESSAGE_TEXT = error_message;
                END IF;

                COMMIT;
            END
        ');
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        // Drop the stored procedure
        DB::unprepared('DROP PROCEDURE IF EXISTS win_lose_validation');
    }
};