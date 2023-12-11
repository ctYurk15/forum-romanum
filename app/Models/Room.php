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

    // Define relationships or additional methods as needed
}
