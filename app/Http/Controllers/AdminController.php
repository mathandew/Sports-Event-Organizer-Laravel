<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function requests()
    {
        $requests = User::where('organizer_status', 'pending')->get();
        return view('admin.requests', compact('requests'));
    }


    public function organizers()
    {
        $organizers = User::whereNotNull('organizer_status')->get();
        return view('admin.organizers', compact('organizers'));
    }

    public function events()
    {
        $user = auth()->user();

        $events = Event::with('organizer')->get();
        $organizer_events = Event::where('user_id', auth()->id())->get();
        $participant_events = Event::where('venue', $user->city)->get();


        return view('admin.events', compact('events', 'organizer_events', 'participant_events'));
    }
    public function teams()
{
    
    $teams = Team::with('players')->get();

    foreach ($teams as $team) {
        $acceptedPlayersCount = $team->players()->where('invitation', 'accepted')->count();

        if ($acceptedPlayersCount >= 15 && !$team->verification_status) {
            $team->update(['verification_status' => true]);
        } elseif ($acceptedPlayersCount < 15 && $team->verification_status) {
            $team->update(['verification_status' => false]);
        }
    }

    return view('admin.teams', compact('teams'));
}


    public function team($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.team', compact('team'));

    }
    public function players()
    {
        $players = Player::all();
        return view('admin.players', compact('players'));
    }

    public function acceptOrganizer(Request $request)
    {
        $organizer = User::findOrFail($request->id);
        $organizer->organizer_status = 'accepted';
        $organizer->role = 'organizer';
        $organizer->save();

        return response()->json(['status' => 'success', 'message' => 'Organizer accepted.']);
    }

    public function rejectOrganizer(Request $request)
    {
        $organizer = User::findOrFail($request->id);
        $organizer->organizer_status = 'rejected';
        $organizer->role = 'participant';
        $organizer->save();

        return response()->json(['status' => 'success', 'message' => 'Organizer rejected.']);
    }

    public function acceptPlayer(Request $request)
    {
        $player = Player::findOrFail($request->id);
        $player->invitation = 'accepted';
        $player->save();

        return response()->json(['status' => 'success', 'message' => 'Player invitation accepted.']);
    }

    public function rejectPlayer(Request $request)
    {
        $player = Player::findOrFail($request->id);
        $player->invitation = 'not accepted';
        $player->save();

        return response()->json(['status' => 'success', 'message' => 'Player invitation rejected.']);
    }

    public function showAdminLogin()
    {
        return view('admin.adminLogin');
    }

    public function handleAdminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if the user is an admin
        if (Auth::attempt($credentials) && Auth::user()->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Welcome, Admin!');
        }

        return redirect()->route('admin.login')->withErrors([
            'email' => 'Invalid credentials or access denied.',
        ]);
    }
    

}

