@include('layouts.header')
@include('layouts.navbar')

<style>
    .banner--overlay:after{
  height: 103px !important;
  top: 0 !important;
  left: 0 !important;
  background: linear-gradient(399deg, #32C2B0 58%, #ffffff) !important;
  opacity: 0.85 !important;

}
</style>

@if(!$event_count)
    <!-- <section class="page-header bg--cover">
       
    </section> -->
@endif
@if ($event_count = 1)
    <section id="home" class="banner banner--overlay" style="background-image: url(assets/images/banner/bg.jpg);">
        <div class="container">
            <div class="banner__wrapper">
                <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">
                <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('organizer.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="time" class="form-label">Time</label>
                                    <input type="time" class="form-control" id="time" name="time" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="venue" class="form-label">Venue</label>
                                    <input type="text" class="form-control" id="venue" name="venue" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="max_teams_allowed" class="form-label">Max Teams Allowed</label>
                                    <input type="number" class="form-control" id="max_teams_allowed"
                                        name="max_teams_allowed" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="entry_fee" class="form-label">Entry Fee</label>
                                    <input type="number" step="0.01" class="form-control" id="entry_fee" name="entry_fee">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prize_details" class="form-label">Prize Details</label>
                                    <textarea class="form-control" id="prize_details" name="prize_details" rows="3"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rules_and_regulations" class="form-label">Rules and Regulations</label>
                                    <textarea class="form-control" id="rules_and_regulations" name="rules_and_regulations"
                                        rows="3" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact Information</label>
                            <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@elseif($event_count >= 2)
    <section class="page-header bg--cover" style="background-image: url(assets/images/header/bg.jpg);">
        <div class="container">
            <div class="page-header__content text-center">
                <h2 class="text-uppercase">You Already Created 2 Events</h2>
                <h3 class="text-uppercase">You Can Only Create Maximum 2 Events</h3>
            </div>
        </div>
    </section>
@endif


@include('layouts.footer')