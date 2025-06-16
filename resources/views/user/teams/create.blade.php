@include('layouts.header')
@include('layouts.navbar')

<section id="home" class="banner banner--overlay" style="background-image: url(assets/images/banner/bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
            <div class="banner__wrapper">
            <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">
                <h1>Register a Team</h1>
                @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="team_name" class="form-label">Team Name</label>
                        <input type="text" name="team_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="team_logo" class="form-label">Team Logo</label>
                        <input type="file" name="team_logo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="team_email" class="form-control" value="{{auth()->user()->email}}" readonly>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="contact_number" class="form-control" value="{{auth()->user()->phone_number}}" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>
    </div>
</section>
@include('layouts.footer')