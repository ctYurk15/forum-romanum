<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'forum_rooms';

    protected $fillable = [
        'title',
        'description',
        'creator_id',
        'created_at',
        'last_message_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = null;

    public function messages()
    {
        return $this->hasMany(RoomMessage::class);
    }

    public function getTotalMessagesCount()
    {
        return $this->messages()->count();
    }

    // Define relationships or additional methods as needed
}
