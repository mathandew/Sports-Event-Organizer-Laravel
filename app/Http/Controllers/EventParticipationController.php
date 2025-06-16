<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Team;
use App\Models\EventParticipation;
use Illuminate\Http\Request;

class EventParticipationController extends Controller
{
    public function create()
    {
        $events = Event::all();
        $teams = Team::where('verification_status', true)->get();
        return view('user.event_participation', compact('events', 'teams'));
    }

    public function store(Request $request)
{
    $request->validate([
        'event_id' => 'required|exists:events,id',
        'team_id' => 'required|exists:teams,id',
        'agreed_to_terms' => 'accepted',
    ]);

    
    $existingParticipation = EventParticipation::where('event_id', $request->event_id)
        ->where('team_id', $request->team_id)
        ->first();

    if ($existingParticipation) {
        return response()->json([
            'error' => 'This team has already participated in this event.',
        ], 422); 
    }

    EventParticipation::create([
        'event_id' => $request->event_id,
        'team_id' => $request->team_id,
        'verified_team_status' => true,
        'agreed_to_terms' => true,
    ]);

    return response()->json([
        'message' => 'Participation registered successfully!',
    ]);
}


    public function index()
    {
        $participations = EventParticipation::with('event', 'team')->get();
        return view('user.event_participations', compact('participations'));
    }
}
