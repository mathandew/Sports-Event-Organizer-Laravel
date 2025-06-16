@include('layouts.header')
@include('layouts.navbar')

<section id="home" class="banner banner--overlay" style="background-image: url(assets/images/banner/bg.jpg);">
    <div class="container">
        <div class="banner__wrapper">
            <div class="banner__content" data-aos="zoom-in" data-aos-duration="900">
                <h1>standings</h1>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Team Logo</th>
                                <th>Team Name</th>
                                <th>Points</th>
                                <th>Wins</th>
                                <th>Losses</th>
                                <th>Draws</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($standings as $index => $standing)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($standing['team']->team_logo)
                                            <img src="{{ asset('uploads/team_logos/' . $standing['team']->team_logo) }}"
                                                alt="{{ $standing['team']->team_name }}" width="50" height="50">
                                        @else
                                            <img src="" alt="" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{ $standing['team']->team_name }}</td>
                                    <td>{{ $standing['points'] }}</td>
                                    <td>{{ $standing['wins'] }}</td>
                                    <td>{{ $standing['losses'] }}</td>
                                    <td>{{ $standing['draws'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                </script>