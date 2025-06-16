@include('layouts.header')
@include('layouts.navbar')

<section id="home" class="banner banner--overlay" style="background-image: url(assets/images/banner/bg.jpg);">
    <div class="container">
        <div class="banner__wrapper">
            <div class="banner__content" data-aos="zoom-in" data-aos-duration="900">
                <h1>Matches for Event: {{ $event->venue }}</h1>
                @if(Auth::user()->role == 'organizer')

                    @if($maxTeamsAllowed == $participationCount)
                        <button class="btn btn-primary" data-toggle="modal" data-target="#createMatchModal">Add Match</button>
                    @else
                        <button type="" class="btn btn-dark" disabled>Add Match</button>
                    @endif
                    <a href="{{ route('matches.standings', ['eventId' => $event->id]) }}"
                        class="btn btn-primary">Standings</a>

                @endif

                @if($matches->isEmpty())
                    <p>No matches scheduled yet.</p>
                @else
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Team 1</th>
                                <th>Team 2</th>
                                <th>Time</th>
                                <th>Venue</th>
                                <th>Score</th>
                                <th>Result</th>
                                @if(Auth::user()->role == 'organizer')
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matches as $match)
                                <tr>
                                    <td>{{ $match->team1->team_name }}</td>
                                    <td>{{ $match->team2->team_name }}</td>
                                    <td>{{ $match->match_time }}</td>
                                    <td>{{ $match->venue }}</td>
                                    <td>{{ $match->team1_score }} - {{ $match->team2_score }}</td>
                                    <td>{{ $match->result }}</td>
                                    @if(Auth::user()->role == 'organizer')
                                        <td>
                                            <form method="POST" action="{{ route('matches.update', $match->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="team1_score" placeholder="Team 1 Score"
                                                    value="{{ $match->team1_score }}">
                                                <input type="text" name="team2_score" placeholder="Team 2 Score"
                                                    value="{{ $match->team2_score }}">
                                                <select name="result">
                                                    <option value="team1" {{ $match->result == 'team1' ? 'selected' : '' }}>Team 1
                                                    </option>
                                                    <option value="team2" {{ $match->result == 'team2' ? 'selected' : '' }}>Team 2
                                                    </option>
                                                    <option value="draw" {{ $match->result == 'draw' ? 'selected' : '' }}>Draw
                                                    </option>
                                                </select>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>


            <!-- Modal for Creating Match -->
            <div class="modal fade" id="createMatchModal" tabindex="-1" aria-labelledby="createMatchModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createMatchModalLabel">Create New Match</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="createMatchForm">
                                @csrf
                                <div class="form-group">
                                    <label for="team1_id">Team 1</label>
                                    <select class="form-control" name="team1_id" id="team1_id" required>
                                        <option value="">Select Team 1</option>
                                        @foreach ($event->participations as $participation)
                                            <option value="{{ $participation->team->id }}">
                                                {{ $participation->team->team_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="team2_id">Team 2</label>
                                    <select class="form-control" name="team2_id" id="team2_id" required>
                                        <option value="">Select Team 2</option>
                                        @foreach ($event->participations as $participation)
                                            <option value="{{ $participation->team->id }}">
                                                {{ $participation->team->team_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="match_time">Match Time</label>
                                    <input type="datetime-local" class="form-control" name="match_time" id="match_time"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-success">Create Match</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.footer')

            <script>
                $(document).ready(function () {
                    $('.table').DataTable({
                        "pageLength": 10,
                        "ordering": true,
                        "searching": true,
                        "lengthChange": true
                    });
                });
                $('#createMatchForm').submit(function (e) {
                    e.preventDefault();

                    let formData = $(this).serialize();
                    let eventId = {{ $event->id }};

                    $.ajax({
                        url: `/events/${eventId}/matches`,
                        method: 'POST',
                        data: formData,
                        success: function (response) {
                            // alert(response.success);
                            location.reload();
                        },
                        error: function (xhr) {
                            alert('An error occurred: ' + xhr.responseText);
                        }
                    });
                });
            </script>