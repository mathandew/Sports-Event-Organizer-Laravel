<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TeamInvitationMail;


class TeamController extends Controller
{
    public function createTeam()
    {
        return view('user.teams.create');
    }

    public function storeTeam(Request $request)
    {
        $request->validate([
            'team_name' => 'required|string|max:255|unique:teams,team_name',
            'team_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_email' => 'required|email|unique:teams,team_email',
            'contact_number' => 'required|string|max:15',
        ]);

        $logoPath = $request->file('team_logo') 
            ? $request->file('team_logo')->store('team_logos', 'public') 
            : null;

        $team = Team::create([
            'team_name' => $request->team_name,
            'team_logo' => $logoPath,
            'captain_id' => auth()->id(),
            'team_email' => $request->team_email,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->route('myteam')
                         ->with('success', 'Team registered successfully!');
    }

    public function showTeam($id)
    {
        $team = Team::with('players')->findOrFail($id);
        return view('user.teams.show', compact('team'));
    }

    public function myTeam(){
        $myTeam = Team::where('captain_id', auth()->id())->first();
        $team = Team::with('players')->findOrFail($myTeam->id);

        // dd($team);

        return view('user.teams.show', compact('team'));
    }

    public function invitePlayers($id)
    {
        $team = Team::findOrFail($id);
        return view('user.teams.invite', compact('team'));
    }

    public function sendInvitations(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $request->validate([
            'players' => 'required|array',
            'players.*.name' => 'required|string|max:255',
            'players.*.email' => 'required|email|unique:players,email',
        ]);

        foreach ($request->players as $playerData) {
            $player = Player::create([
                'team_id' => $team->id,
                'name' => $playerData['name'],
                'email' => $playerData['email'],
            ]);

            // Send Invitation Email
            $invitationLink = route('players.acceptInvitation', $player->id);
            Mail::to($player->email)->send(new \App\Mail\TeamInvitationMail($player, $team, $invitationLink));
        }

        return redirect()->route('teams.show', $team->id)
                         ->with('success', 'Invitations sent successfully!');
    }

    public function acceptInvitation($id)
    {
        $player = Player::findOrFail($id);
        $player->update(['invitation' => 'accepted']);

        return redirect()->route('dashboard')->with('success', 'You have joined the team successfully!');
    }
}
