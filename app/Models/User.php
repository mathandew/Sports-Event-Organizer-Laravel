<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'city',
        'role',
        'cnic',
        'phone_number',
        'player_role',
        'age',
        'location',
        'profile_picture',
        'verification_status',
        'organizer_status',
        'email_verification_token',
        'profile_complete',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationships
    public function teamsAsCaptain()
    {
        return $this->hasMany(Team::class, 'captain_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'user_id');
    }

    public function team()
    {
        return $this->hasOne(Team::class, 'captain_id');
    }

    public function checkProfileComplete(): bool
    {
        return !empty($this->name) &&
            !empty($this->email) &&
            !empty($this->password) &&
            !empty($this->city) &&
            !empty($this->role) &&
            !empty($this->cnic) &&
            !empty($this->phone_number) &&
            !empty($this->age) &&
            !empty($this->location);
    }

    public function updateProfileComplete()
    {
        $this->profile_complete = $this->checkProfileComplete();
        $this->save();
    }
}
