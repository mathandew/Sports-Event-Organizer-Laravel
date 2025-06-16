
<div class="container">
    <h2>Event Participations</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Event</th>
                <th>Team</th>
                <th>Verified Status</th>
                <th>Agreed to Terms</th>
            </tr>
        </thead>
        <tbody>
            @foreach($participations as $participation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $participation->event->venue }}</td>
                    <td>{{ $participation->team->team_name }}</td>
                    <td>{{ $participation->verified_team_status ? 'Yes' : 'No' }}</td>
                    <td>{{ $participation->agreed_to_terms ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>