@include('layouts.header')
@include('layouts.navbar')

<section id="home" class="banner banner--overlay" style="background-image: url(assets/images/banner/bg.jpg);">
    <div class="container">
        <div class="banner__wrapper">
            <div class="banner__content" data-aos="zoom-in" data-aos-duration="900">
                <h1 class="text-center">Event Details</h1>

                <table class="table text-left">
                    <tr>
                        <th>Time</th>
                        <td>{{ $event->time }}</td>
                    </tr>
                    <tr>
                        <th>Venue</th>
                        <td>{{ $event->venue }}</td>
                    </tr>
                    <tr>
                        <th>Max Teams Allowed</th>
                        <td>{{ $event->max_teams_allowed }}</td>
                    </tr>
                    <tr>
                        <th>Entry Fee</th>
                        <td>{{ $event->entry_fee }}</td>
                    </tr>
                    <tr>
                        <th>Prize Details</th>
                        <td>{{ $event->prize_details }}</td>
                    </tr>
                    <tr>
                        <th>Rules and Regulations</th>
                        <td>{{ $event->rules_and_regulations }}</td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td>{{ $event->contact }}</td>
                    </tr>
                    <tr>
                        <th>Organizer</th>
                        <td>{{ $event->organizer->name ?? 'N/A' }}</td>
                    </tr>
                </table>
                <a href="{{ route('events') }}" class="btn btn-secondary">Back to Events</a>
                @if(Auth::user()->role == 'participant' && Auth::user()->organizer_status == null || Auth::user()->organizer_status == 'pending' || Auth::user()->organizer_status == 'rejected' && Auth::user()->team->verification_status == '1')
                    <a href="#" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#participationModal">Participate</a>
                @endif
                <a href="{{ route('matches.index', ['eventId' => $event->id]) }}" class="btn btn-primary">View
                    Matches</a>

            </div>
        </div>
    </div>


</section>
<!-- Modal -->
<div class="modal fade" id="participationModal" tabindex="-1" aria-labelledby="participationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="participationModalLabel">Participate in Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="participationForm">
                    @csrf
                    <div class="mb-3">
                        <label for="event_id" class="form-label">Event</label>
                        <input type="text" class="form-control" id="event_id" name="event_id" value="{{ $event->id }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="team_id" class="form-label">Team</label>
                        <select class="form-control" id="team_id" name="team_id">
                        @if(Auth::user()->role == 'participant' && 
                        (Auth::user()->organizer_status == null || 
                            Auth::user()->organizer_status == 'pending' || 
                            (Auth::user()->organizer_status == 'rejected' && Auth::user()->profile_complete == '1' && optional(Auth::user()->team)->verification_status == '1')))
                            
                            @if(optional(Auth::user()->team)->id)
                                <option value="{{ Auth::user()->team->id }}">{{ Auth::user()->team->team_name }}</option>
                            @endif

                        @endif                       
                    </select>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="agreed_to_terms" name="agreed_to_terms"
                            required>
                        <label class="form-check-label" for="agreed_to_terms">I agree to the terms and
                            conditions</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

<script>
    $(document).ready(function () {
        $('#participationForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('event-participation.store') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    alert(response.message);
                    $('#participationModal').modal('hide');
                    $('#participationForm')[0].reset();
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                        let response = JSON.parse(xhr.responseText);
                        alert(response.error);  // Show the specific error message
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>