<?php

// database/migrations/2022_01_01_create_room_messages_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('room_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('user_id');
            $table->text('message_text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_messages');
    }
}

