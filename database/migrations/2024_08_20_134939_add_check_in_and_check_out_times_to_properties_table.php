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
        Schema::table('properties', function (Blueprint $table) {
            $table->time('check_in_time')->after('user_id')->nullable(); // وقت الوصول، الافتراضي 04:00 مساءً
            $table->time('check_out_time')->after('check_in_time')->nullable(); // وقت المغادرة
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('check_in_time');
            $table->dropColumn('check_out_time');
        });
    }
};
