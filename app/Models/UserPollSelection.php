<?php

// app/Models/UserPollSelection.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPollSelection extends Model
{
    protected $fillable = [
        'user_id',
        'poll_id',
        'poll_option_id',
        // Add other columns as needed
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public function pollOption()
    {
        return $this->belongsTo(PollOption::class);
    }
}
