<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class MatchSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'team1_id',
        'team2_id',
        'match_time',
        'venue',
        'team1_score',
        'team2_score',
        'result',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
}


