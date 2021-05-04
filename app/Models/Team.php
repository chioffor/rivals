<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rivals()
    {
        return $this->belongsToMany(Team::class, 'team_rival', 'team_id', 'rival_id')
                        ->withPivot('match_date', 'match_time');
    }
}
