@include('layouts.header')
@include('layouts.navbar')

<style>
    .banner--overlay:after{
  height: 82% !important;
  top: 0 !important;
  left: 0 !important;
  background: linear-gradient(399deg, #32C2B0 58%, #ffffff) !important;
  opacity: 0.85 !important;

}
</style>

<section class="banner banner--overlay">

</section>

<section class="page-header">
    <div class="container">
        <div class="page-header__content text-center">
            <h2 class="text-uppercase">Event Participations</h2>
        </div>
    </div>
</section>

<!-- ==========signin Section start Here========== -->
<div class="account padding-top padding-bottom">
    <div class=" container">
        <div class="row g-5 align-items-center flex-md-row-reverse">
            <div class="col-lg-5">
                <div class="account__wrapper">
                    <h3 class="title">Register Team for Event</h3>
                    <!-- <form class="account__form"> -->
                    <form class="account__form" action="{{ route('event-participation.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-4">
                            <select name="event_id" id="floatingInput" class="form-control">
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->venue }} (Max Teams:
                                        {{ $event->max_teams_allowed }})
                                    </option>
                                @endforeach
                            </select>
                            <label for="floatingInput event_id">Select Event:</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select name="team_id" id="floatingInput" class="form-control">
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInput team_id">Select Team:</label>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                                <div class="checkgroup">
                                    <input type="checkbox" name="agreed_to_terms" id="agreed_to_terms">
                                    <label for="agreed_to_terms">I agree to the terms and conditions</label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <button class="d-block default-btn move-top"><span>Submit</span></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="account-img">
                    <img src="assets/images/account/sign-in.png" alt="shape-image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==========signin Section ends Here========== -->


@include('layouts.footer')