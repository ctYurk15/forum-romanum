<?php
// database/migrations/xxxx_xx_xx_create_user_poll_selections_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPollSelectionsTable extends Migration
{
    public function up()
    {
        Schema::create('user_poll_selections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('poll_id'); // Add this line
            $table->unsignedBigInteger('poll_option_id');
            $table->timestamps();

            // Add foreign key constraints
            $table->index('user_id');
            $table->index('poll_id');
            $table->index('poll_option_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade'); // Add this line
            $table->foreign('poll_option_id')->references('id')->on('poll_options')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_poll_selections');
    }
}
