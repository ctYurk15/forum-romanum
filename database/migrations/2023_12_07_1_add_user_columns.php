<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the 'rating' column with a default value of 0
            $table->integer('rating')->default(0);

            // Add the 'photo_path' column
            $table->string('photo_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove the 'rating' and 'photo_path' columns if rolling back the migration
            $table->dropColumn('rating');
            $table->dropColumn('photo_path');
        });
    }
}
