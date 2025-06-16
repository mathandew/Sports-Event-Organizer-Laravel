<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{

    public function showEvent($id)
{
    $event = Event::with('organizer')->findOrFail($id);
    return view('user.event', compact('event'));
}
    public function event()
    {
        $event_count = Event::where('user_id', auth()->id())->count();
        return view('organizer.createEvent', compact('event_count'));
    }
    public function createEvent(Request $request)
    {
        $request->validate([
            'time' => 'required',
            'venue' => 'required|string|max:255',
            'max_teams_allowed' => 'required|integer|min:1',
            'entry_fee' => 'nullable|numeric|min:0',
            'prize_details' => 'required|string',
            'rules_and_regulations' => 'required|string',
            'contact' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        if ($user->role !== 'organizer') {
            return redirect()->back()->withErrors('Only organizers can create events.');
        }

        Event::create([
            'time' => $request->time,
            'venue' => $request->venue,
            'max_teams_allowed' => $request->max_teams_allowed,
            'entry_fee' => $request->entry_fee,
            'prize_details' => $request->prize_details,
            'rules_and_regulations' => $request->rules_and_regulations,
            'contact' => $request->contact,
            'user_id' => $user->id,
        ]);

        return redirect()->route('organizer.createEvent')->with('success', 'Event created successfully!');
    }

    public function viewEventsNearby(Request $request)
    {
        $user = auth()->user();
        $events = Event::where('location', $user->city)->get();
        return view('events.nearby', compact('events'));
    }
}

