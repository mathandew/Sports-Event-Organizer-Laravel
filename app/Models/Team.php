<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_name',
        'team_logo',
        'captain_id',
        'team_email',
        'contact_number',
        'verification_status',
    ];

    // Relationships
    public function captain()
    {
        return $this->belongsTo(User::class, 'captain_id');
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function participations()
{
    return $this->hasMany(EventParticipation::class);
}
}
