<?php

// app/Models/PollOption.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    protected $fillable = [
        'poll_id',
        'option_text',
        // Add other columns as needed
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public function userPollSelections()
    {
        return $this->hasMany(UserPollSelection::class);
    }
}
