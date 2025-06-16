@include('layouts.header')
@include('layouts.navbar')

<section id="home" class="banner banner--overlay" style="background-image: url(assets/images/banner/bg.jpg);">
    <div class="container">
       <div class="row">
        <div class="col-8 mx-auto">
        <div class="banner__wrapper">
            <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">
                <h1>Invite Players</h1>
                <form action="{{ route('teams.sendInvitations', $team->id) }}" method="POST">
                    @csrf
                    <div id="player-invitations">
                        <div class="mb-3">
                            <label for="players[0][name]" class="form-label">Player Name</label>
                            <input type="text" name="players[0][name]" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="players[0][email]" class="form-label">Player Email</label>
                            <input type="email" name="players[0][email]" class="form-control" required>
                        </div>
                    </div>
                    <button type="button" id="add-player" class="btn btn-secondary">Add More Players</button>
                    <button type="submit" class="btn btn-primary">Send Invitations</button>
                </form>
            </div>


        </div>
        </div>
       </div>
    </div>
    </div>
    </div>
</section>
@include('layouts.footer')