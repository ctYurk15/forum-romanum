<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'voter_id',
        'voted_user_id',
        'vote_type',
    ];

    public function voter()
    {
        return $this->belongsTo(User::class, 'voter_id');
    }

    public function votedUser()
    {
        return $this->belongsTo(User::class, 'voted_user_id');
    }
}