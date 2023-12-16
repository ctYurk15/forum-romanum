<?php

// database/migrations/xxxx_xx_xx_create_polls_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->string('poll_name');
            $table->text('poll_description');
            $table->unsignedBigInteger('creator_user_id');
            $table->string('poll_type')->default('default');
            $table->timestamps();

            // Add foreign key constraint for the creator user
            $table->index('creator_user_id');
            $table->foreign('creator_user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('polls');
    }
}
