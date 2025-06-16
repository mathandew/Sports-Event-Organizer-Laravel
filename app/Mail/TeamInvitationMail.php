<?php

namespace App\Mail;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $player;
    public $team;
    public $invitationLink;

    /**
     * Create a new message instance.
     */
    public function __construct(Player $player, Team $team, $invitationLink)
    {
        $this->player = $player;
        $this->team = $team;
        $this->invitationLink = $invitationLink;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Team Invitation')
                    ->view('emails.team-invitation')
                    ->with([
                        'player' => $this->player,
                        'team' => $this->team,
                        'invitationLink' => $this->invitationLink,
                    ]);
    }
}
