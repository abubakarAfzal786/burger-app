<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::unprepared('
        // CREATE TRIGGER tr_User_Default_Member_Role AFTER UDATE ON `ingredients` FOR EACH ROW
        //     BEGIN
        //         INSERT INTO role_user (`role_id`, `user_id`, `created_at`, `updated_at`) 
        //         VALUES (3, NEW.id, now(), null);
        //     END
        // ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role`');
    }
}
