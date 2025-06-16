<h1>Hello, {{ $player->name }}</h1>
<p>You have been invited to join the team "{{ $team->team_name }}".</p>
<p>Click the link below to accept the invitation:</p>
<a href="{{ $invitationLink }}">Accept Invitation</a>
