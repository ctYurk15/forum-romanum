<?php

// app/Models/RoomMessage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomMessage extends Model
{
    use HasFactory;

    protected $table = 'room_messages';

    protected $fillable = [
        'room_id',
        'user_id',
        'message_text',
    ];

    // Define relationships if needed
    // For example, a room message belongs to a room and a user
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
