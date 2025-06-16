@include('layouts.header')
@include('layouts.navbar')

<style>
    .banner--overlay:after{
  height: 103px !important;
  top: 0 !important;
  left: 0 !important;
  background: linear-gradient(399deg, #32C2B0 58%, #ffffff) !important;
  opacity: 0.85 !important;
  width: 100% !important;

}
</style>

<section id="home" class="banner banner--overlay">
    <div class="container">
        <div class="banner__wrapper">
            <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">
                <h1>Events</h1>
                @if(Auth::user()->role == 'participant')
                    <table id="usersTable" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Organizer Name</th>
                                <th>Venue</th>
                                <th>Time</th>
                                <th>Max Teams</th>
                                <th>Entry Fee</th>
                                <th>Created At</th>
                                <th>Show Event</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participant_events as $event)
                                <tr id="row-{{ $event->id }}">
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->organizer->name }}</td>
                                    <td>{{ $event->venue }}</td>
                                    <td>{{ $event->time }}</td>
                                    <td>{{ $event->max_teams_allowed }}</td>
                                    <td>{{ $event->entry_fee }}</td>
                                    <td>{{ $event->created_at }}</td>
                                    <td>
                                        <a href="{{ route('user.event', $event->id) }}" class="btn btn-primary">View</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if(Auth::user()->role == 'organizer')
                    <table id="usersTable" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Organizer Name</th>
                                <th>Venue</th>
                                <th>Time</th>
                                <th>Max Teams</th>
                                <th>Entry Fee</th>
                                <th>Created At</th>
                                <th>Show Event</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($organizer_events as $event)
                                <tr id="row-{{ $event->id }}">
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->organizer->name }}</td>
                                    <td>{{ $event->venue }}</td>
                                    <td>{{ $event->time }}</td>
                                    <td>{{ $event->max_teams_allowed }}</td>
                                    <td>{{ $event->entry_fee }}</td>
                                    <td>{{ $event->created_at }}</td>
                                    <td>
                                        <a href="{{ route('user.event', $event->id) }}" class="btn btn-primary">View</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if(Auth::user()->role == 'admin')
                    <table id="usersTable" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Organizer Name</th>
                                <th>Venue</th>
                                <th>Time</th>
                                <th>Max Teams</th>
                                <th>Entry Fee</th>
                                <th>Created At</th>
                                <th>Show Event</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr id="row-{{ $event->id }}">
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->organizer->name }}</td>
                                    <td>{{ $event->venue }}</td>
                                    <td>{{ $event->time }}</td>
                                    <td>{{ $event->max_teams_allowed }}</td>
                                    <td>{{ $event->entry_fee }}</td>
                                    <td>{{ $event->created_at }}</td>
                                    <td>
                                        <a href="{{ route('user.event', $event->id) }}" class="btn btn-primary">View</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')