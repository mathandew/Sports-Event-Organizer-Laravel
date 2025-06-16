@include('layouts.header')
@include('layouts.navbar')

<section id="home" class="banner" style="background:linear-gradient(399deg, #32C2B0 58%, #ffffff) !important;height:40em !important;">
    <div class="container">
        <div class="banner__wrapper">
            <div class="banner__content" data-aos="zoom-in" data-aos-duration="900">
                <h1 class="text-center">Become an Organizer</h1>

                <!-- Display success or error messages -->
                @if(session('message'))
                    <p>{{ session('message') }}</p>
                @endif

                <!-- Check if the user is already an organizer -->
                @if(Auth::user()->organizer_status == 'accepted')
                    <p class="text-center">You are already an organizer.</p>
                @elseif(Auth::user()->organizer_status == 'pending')
                    <p class="text-center">Your request to become an organizer is already pending.</p>
                    @elseif(Auth::user()->organizer_status == 'rejected')
                    <p class="text-center">Your request to become an organizer is Rejeted</p>
                @else
                    <form method="POST" class="text-center" action="{{ route('become-organizer') }}">
                        @csrf

                        <!-- Add any other fields you need for the form -->

                        <button type="submit" class="default-btn move-right ">
                            <span>Request to Become an Organizer <i class="fa-solid fa-arrow-right"></i></span>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
