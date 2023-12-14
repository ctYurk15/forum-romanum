<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voter_id');
            $table->unsignedBigInteger('voted_user_id');
            $table->string('vote_type'); // New column for the type of vote
            $table->timestamps();

            // Add foreign keys
            $table->index('voter_id');
            $table->foreign('voter_id')->references('id')->on('users');
            $table->index('voted_user_id');
            $table->foreign('voted_user_id')->references('id')->on('users');

            // Ensure that a user can only vote for another user once
            $table->unique(['voter_id', 'voted_user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
    }
}