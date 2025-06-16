@include('layouts.header')
@include('layouts.navbar')

<section class="page-header bg--cover" style="background-image: url(assets/images/header/bg.jpg);">
    <div class="container">
        <div class="page-header__content text-center">
            <h1>Team Details</h1>
            <p><strong>Team Name:</strong> {{ $team->team_name }}</p>
            <p><strong>Team Email:</strong> {{ $team->team_email }}</p>
            <p><strong>Contact Number:</strong> {{ $team->contact_number }}</p>
            <a href="{{ route('teams.invite', $team->id) }}" class="default-btn move-right"><span>Invite Players <i
                        class="fa-solid fa-arrow-right"></i></span> </a>
        </div>
    </div>
</section>

<section class="team padding-top padding-bottom" id="speaker" style="background-image:url(assets/images/team/bg.png)">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
            <h2>Players</h2>
        </div>
        <div class="team__wrapper">
            <div class="row g-4" id="players-list">
                @foreach ($team->players as $player)
                    <div class="col-lg-6 player-item" id="player-{{ $player->id }}">
                        <div class="team__item" data-aos="fade-left" data-aos-duration="900">
                            <div class="team__item-inner">
                                <div class="team__item-thumb">
                                    <img src="{{url('images/player/player_profile.jpg')}}" alt="logo">
                                </div>
                                <div class="team__item-content">
                                    <div class="team__item-author">
                                        <h4>{{ $player->name }}</h4>
                                        <p>{{ $player->email }}</p>
                                        <p><strong>Invitation:</strong> {{ $player->invitation }}</p>
                                        <button class="default-btn remove-player" data-player-id="{{ $player->id }}">Remove Player</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.remove-player', function () {
        var playerId = $(this).data('player-id');
        var playerElement = $('#player-' + playerId);

        if (confirm('Are you sure you want to remove this player?')) {
            $.ajax({
                url: '{{ route('player.remove') }}', // Create this route in your web.php
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    player_id: playerId
                },
                success: function (response) {
                    if (response.success) {
                        playerElement.remove(); // Remove player from the DOM
                        alert('Player removed successfully!');
                    } else {
                        alert('Failed to remove player.');
                    }
                },
                error: function () {
                    alert('Something went wrong. Please try again.');
                }
            });
        }
    });
</script>
