<header class="header-section">
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{url('images/logo/logo.png')}}" alt="logo">
                    </a>
                </div>
                <div class="menu-area">
                    @if(Auth::user()->role == 'admin')

                        <ul class="menu">
                            <li>
                                <a href="{{ route('organizers') }}">Organizers</a>
                            </li>
                            <li>
                                <a href="{{ route('events') }}">Events</a>
                            </li>
                            <li>
                                <a href="{{ route('teams') }}">Teams</a>
                            </li>
                        </ul>

                    @endif

                    @if(Auth::user()->role == 'organizer')

                        <ul class="menu">
                            <li>
                                <a href="{{ route('organizer.createEvent') }}">Create Event</a>
                            </li>
                            <li>
                                <a href="{{ route('events') }}">Events</a>
                            </li>
                            <li>
                                <a href="{{ route('teams') }}">Teams</a>
                            </li>
                        </ul>

                    @endif

                    @if(Auth::user()->role == 'participant' && Auth::user()->organizer_status == null || Auth::user()->organizer_status == 'pending' || Auth::user()->organizer_status == 'rejected')
                        <ul class="menu">
                            <li>
                                <a href="{{ route('events') }}">Events</a>

                            </li>
                            @if(!auth()->user()->team && Auth::user()->organizer_status == null && Auth::user()->profile_complete == true)
                                <li>
                                    <a href="{{ route('teams.create') }}">Create Team</a>
                                </li>
                            @endif
                            @if(auth()->user()->team)
                                <li>
                                    <a href="{{ route('myteam') }}">My Team</a>
                                </li>
                            @endif
                        </ul>
                    @endif

                    <div class="header-btn">
                    @if (Auth::user()->role == 'organizer' || Auth::user()->role == 'participant')
                            <a href="{{ route('profile.edit') }}" class="default-btn move-right">
                                <span>{{ Auth::user()->name }} - (Profile) <i
                                        class="fa-solid fa-arrow-right">Profile</i></span>
                            </a>
                        @endif
                        @if(!auth()->user()->team)
                            @if(Auth::user()->role == 'participant' && Auth::user()->organizer_status == null || Auth::user()->organizer_status == 'pending' || Auth::user()->organizer_status == 'rejected')
                                <a href="{{ route('become-organizer') }}" class="default-btn move-right">
                                    <span>Become Organizer <i
                                            class="fa-solid fa-arrow-right">{{ Auth::user()->role }}</i></span>
                                </a>
                            @endif
                        @endif

                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="default-btn move-right">
                                <span>Logout <i class="fa-solid fa-arrow-right"></i></span>
                            </button>
                        </form>
                    </div>

                    <!-- toggle icons -->
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>