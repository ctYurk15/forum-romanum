<?php

// app/Models/Poll.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_name',
        'poll_description',
        'creator_user_id',
        // Add other columns as needed
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }

    // Additional methods or relationships can be added here
}
