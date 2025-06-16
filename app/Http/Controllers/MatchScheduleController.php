<?php

namespace App\Http\Controllers;

use App\Models\MatchSchedule;
use App\Models\Event;
use App\Models\EventParticipation;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchScheduleController extends Controller
{
    public function index($eventId)
    {
        $event = Event::findOrFail($eventId);
        $maxTeamsAllowed = $event->max_teams_allowed;
        $participationCount = EventParticipation::where('event_id', $event->id)->count();

        // Get all match schedules for this event
        $matches = MatchSchedule::where('event_id', $eventId)->get();

        // Calculate the standings based on match results
        $standings = $this->calculateStandings($eventId);

        $standings = $this->calculateStandings($eventId);

        return view('matches.index', compact('event', 'participationCount', 'maxTeamsAllowed','matches', 'standings'));
    }

    public function store(Request $request, $eventId)
    {
        $request->validate([
            'team1_id' => 'required|different:team2_id',
            'team2_id' => 'required',
            'match_time' => 'required|date',
        ]);

        MatchSchedule::create([
            'event_id' => $eventId,
            'team1_id' => $request->team1_id,
            'team2_id' => $request->team2_id,
            'match_time' => $request->match_time,
            'venue' => Event::findOrFail($eventId)->venue,
        ]);

        return response()->json(['success' => 'Match created successfully!']);
    }

    public function update(Request $request, $id)
    {
        $match = MatchSchedule::findOrFail($id);
        $match->update($request->only('team1_score', 'team2_score', 'result', 'match_time', 'venue'));

        return redirect()->back()->with('success', 'Match updated successfully.');
    }

    public function generateStandings($eventId)
    {
        $standings = $this->calculateStandings($eventId);

        return view('matches.standings', compact('standings'));
    }

    private function calculateStandings($eventId)
    {
        $teams = Team::whereIn('id', EventParticipation::where('event_id', $eventId)->pluck('team_id'))->get();

        $standings = [];

        foreach ($teams as $team) {
            $matches = MatchSchedule::where('event_id', $eventId)
                ->where(function ($query) use ($team) {
                    $query->where('team1_id', $team->id)->orWhere('team2_id', $team->id);
                })
                ->get();

            $points = 0;
            $wins = 0;
            $losses = 0;
            $draws = 0;

            foreach ($matches as $match) {
                if ($match->result) {
                    if ($match->result === 'team1' && $match->team1_id === $team->id) {
                        $points += 2;
                        $wins++;
                    } elseif ($match->result === 'team2' && $match->team2_id === $team->id) {
                        $points += 2;
                        $wins++;
                    } elseif ($match->result === 'draw') {
                        $points += 1;
                        $draws++;
                    } else {
                        $losses++;
                    }
                }
            }

            $standings[] = [
                'team' => $team,
                'points' => $points,
                'wins' => $wins,
                'losses' => $losses,
                'draws' => $draws,
            ];
        }

        usort($standings, function ($a, $b) {
            if ($a['points'] === $b['points']) {
                return $b['wins'] <=> $a['wins'];
            }
            return $b['points'] <=> $a['points'];
        });

        return $standings;
    }

    public function scheduleFinalMatch($eventId)
    {
        $standings = $this->calculateStandings($eventId);

        if (count($standings) < 2) {
            return redirect()->back()->with('error', 'Not enough teams to schedule a final match.');
        }

        $team1 = $standings[0]['team'];
        $team2 = $standings[1]['team'];

        MatchSchedule::create([
            'event_id' => $eventId,
            'team1_id' => $team1->id,
            'team2_id' => $team2->id,
            'match_time' => now()->addDays(1)->format('H:i:s'),
            'venue' => Event::findOrFail($eventId)->venue,
        ]);

        return redirect()->route('matches.index', $eventId)->with('success', 'Final match scheduled successfully.');
    }
}
