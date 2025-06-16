<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'venue',
        'max_teams_allowed',
        'entry_fee',
        'prize_details',
        'rules_and_regulations',
        'contact',
        'user_id',
    ];

    
    public function organizer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participations()
{
    return $this->hasMany(EventParticipation::class);
}
}
