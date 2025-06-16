@include('layouts.header')
@include('layouts.navbar')

<section id="home" class="banner banner--overlay" style="background-image: url(assets/images/banner/bg.jpg);">
    <div class="container">
        <div class="banner__wrapper">
            <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">
                <h1>Matches</h1>
                @if(Auth::user()->role == 'organizer')
                    <table id="usersTable" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Team Name</th>
                                <th>Team Email</th>
                                <th>Contact Number</th>
                                <th>Verification Status</th>
                                <th>Created At</th>
                                <th>Show</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                                <tr id="row-{{ $team->id }}">
                                    <td>{{ $team->id }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->team_email }}</td>
                                    <td>{{ $team->contact_number }}</td>
                                    @if($team->verification_status == 0 )
                                    <td>Not Verified</td>
                                    @elseif($team->verification_status == 1)
                                    <td>Verified</td>
                                    @endif
                                    <td>{{ $team->created_at }}</td>
                                    <td>
                                        <a href="{{ route('user.event', $team->id) }}" class="btn btn-primary">View</a>
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
                                <th>Team Name</th>
                                <th>Team Email</th>
                                <th>Contact Number</th>
                                <th>Verification Status</th>
                                <th>Created At</th>
                                <th>Show</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                                <tr id="row-{{ $team->id }}">
                                    <td>{{ $team->id }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->team_email }}</td>
                                    <td>{{ $team->contact_number }}</td>
                                    @if($team->verification_status == 0 )
                                    <td>Not Verified</td>
                                    @elseif($team->verification_status == 1)
                                    <td>Verified</td>
                                    @endif
                                    <td>{{ $team->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.team', $team->id) }}" class="btn btn-primary">View</a>
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