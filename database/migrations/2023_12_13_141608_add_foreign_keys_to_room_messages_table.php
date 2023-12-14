<?php

// database/migrations/2022_01_01_create_room_messages_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRoomMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('room_messages', function (Blueprint $table) {
            $table->index('room_id');
            $table->foreign('room_id')
                ->references('id')
                ->on('forum_rooms')
                ->onDelete('cascade');

            $table->index('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('room_messages', function (Blueprint $table) {
            $table->dropForeign(['room_id']);
            $table->dropForeign(['user_id']);
        });
    }

}

