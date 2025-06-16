<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uevent- Multipurpose Event, Conference & Meetup HTML5 Template</title>

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/aos.css')}}">
    <link rel="stylesheet" href="{{url('css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('css/lightcase.css')}}">
    <link rel="stylesheet" href="{{url('css/swiper-bundle.min.css')}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- main css for template -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<style>
    .sponsor__item a img {
        height: 130px;
        weight : 200px;
    }
</style>

<body>

    <!-- ===============>> Preloader start here <<================= -->
    <div class="preloader">
        <img src="{{url('images/logo/preloader.gif')}}" alt="Uevent">
    </div>
    <!-- ===============>> Preloader end here <<================= -->



    <!-- ========== Multipage Header Section Starts Here========== -->
    <header class="header-section">
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="#">
                            <img src="{{url('images/logo/logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <div class="menu-area">
                        <ul class="menu">
                            <li>
                                <a href="#home">Home</a>
                            </li>

                            <li>
                                <a href="#about">About</a>
                            </li>
                            <li>
                                <a href="#event">Events</a>
                            </li>
                            <li>
                                <a href="#faq">Faqs</a>
                            </li>
                            <li>
                                <a href="#contact">Contact</a>
                            </li>
                        </ul>
                        <div class="header-btn">
                            @if (Route::has('login'))
                                <nav class="-mx-3 flex flex-1 justify-end">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Dashboard
                                        </a>
                                    @else
                                        <div class="header-btn">
                                            <a href="{{ route('login') }}" class="default-btn move-right">
                                                <span>Log in <i class="fa-solid fa-arrow-right"></i></span>
                                            </a>
                                        </div>

                                    @endauth
                                </nav>
                            @endif
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
    <!-- ========== Multipage Header Section Ends Here========== -->



    <!-- ================> Banner section start here <================== -->
    <section id="home" class="banner" style="background:linear-gradient(399deg, #32C2B0 58%, #ffffff) !important;">
        <!-- Video Background -->


        <div class="container">
            <div class="banner__wrapper">
                <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">
                    <h1 style="font-size: 65px !important;color:black;font-weight:bold;margin-top:30px">Sportsync
                        Launching</h1>
                    <h3 style="font-size: 45px;color:black;font-weight:bold;">18 Feb In Hyderabad</h3>
                    <!-- <div class="banner__bottom"></div> -->
                    <a href="{{ route('register') }}" class="default-btn move-right">
                        <span>Register Now <i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> Banner section end here <================== -->




    <!-- ================> Register section start here <================== -->
    <!-- <div class="register register--uplifted" data-aos="fade-up" data-aos-duration="900" id="register">
        <div class="container">
            <div class="register__wrapper">
                <form action="#" class="register__form">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <input type="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <a href="signup.html" class="default-btn  default-btn--secondary move-right"><span>Register
                                    <i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!-- ================> Register section end here <================== -->




    <!-- ================> About section start here <================== -->
    <section id="about" class="about padding-top padding-bottom">
        <div class="container">
            <div class="about__wrapper">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="about__thumb" data-aos="fade-up" data-aos-duration="1500">
                            <img src="{{url('images/about/about.jpeg')}}" alt="About Sportsync">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content" data-aos="fade-up" data-aos-duration="2000">
                            <p class="subtitle">The Story</p>
                            <h2>About Sportsync</h2>
                            <p>
                                Sportsync is a dynamic and user-friendly Sports Management System designed to
                                revolutionize
                                how sports events are organized and managed. Our platform bridges the gap between event
                                organizers, participants, and teams, making it simpler to plan, execute, and track
                                sports
                                activities seamlessly. Whether you are organizing a local tournament or managing a
                                large-scale
                                sports league, Sportsync has the tools you need to succeed.
                            </p>

                            <div class="about__content-feature">
                                <h5>Key Features</h5>

                                <h6>Event Management:</h6>
                                <p>Create and manage events effortlessly. Schedule matches, track game times, and update
                                    event details in real time.</p>

                                <h6>Team Management:</h6>
                                <p>Maintain detailed profiles for participating teams. Assign players to teams and track
                                    team performance over time.</p>

                                <h6>Participant Registration:</h6>
                                <p>Streamlined registration process for players, teams, and organizers. Automated
                                    notifications and confirmations.</p>

                                <h6>Fixture Generation:</h6>
                                <p>Generate fixtures and brackets with a single click. Support for round-robin,
                                    knockout, and hybrid tournament formats.</p>

                                <h6>Result Management:</h6>
                                <p>Record and publish match results instantly. Generate detailed reports for analysis
                                    and future reference.</p>

                                <h6>User-Friendly Interface:</h6>
                                <p>Intuitive design ensuring ease of use for all user types. Responsive platform
                                    accessible from any device.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================> About section end here <================== -->




    <!-- ================> feature section start here <================== -->
    <section class="feature padding-top padding-bottom bg--white" id="feature">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Features</p>
                <h2>What We Offer?</h2>
            </div>

            <div class="feature__wrapper">
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-calendar-alt"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4>Organize Events</h4>
                                    <div class="feature__item-text">
                                        <p>Create, manage, and promote sports events with ease.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="100">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4>Team Participation</h4>
                                    <div class="feature__item-text">
                                        <p>Track and manage participating teams, including player statistics and
                                            rosters.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="feature__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="200">
                            <div class="feature__item-inner">
                                <div class="feature__item-thumb">
                                    <div class="icon">
                                        <i class="fa-solid fa-clock"></i>
                                    </div>
                                </div>
                                <div class="feature__item-content text-center">
                                    <h4>Fixtures & Scheduling</h4>
                                    <div class="feature__item-text">
                                        <p>Simplify the scheduling process and ensure a balanced tournament structure.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================> feature section end here <================== -->




    <!-- ================> Event access section start here <================== -->
    <!-- <section class="event-access padding-top padding-bottom">
        <div class="mockup" data-aos="fade-up-left" data-aos-duration="900">
            <img class="mok-img" src="./assets/images/event/mobile.png" alt="">
        </div>
        <div class="container">
            <div class="contact__wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="event-access-content" data-aos="fade-right" data-aos-duration="900">
                            <h2>You can access us from mobile !</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi
                                dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci
                                tation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            </p>
                            <a href="#" class="default-btn move-right"><span>Get Ticket <i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ================> Event access section end here <================== -->



    <!-- ================> Event schedule section start here <================== -->
    <section id="event" class="team padding-top padding-bottom" id="speaker" style="background-image:url(images/team/bg.png)">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <h2>Events</h2>
            </div>
            <div class="team__wrapper">
                <div class="row g-4">
                    @foreach($events as $event)
                        <div class="col-lg-6">
                            <div class="team__item" data-aos="fade-left" data-aos-duration="900">
                                <div class="team__item-inner">
                                    <div class="team__item-content">
                                        <div class="team__item-author">
                                            <h4><a href="">Organizer</a> </h4>
                                            <p>{{ $event->organizer->rules_and_regulations }}</p>
                                        </div>
                                        <p><strong>Venue : </strong>{{ $event->venue }}</p>
                                        <p><strong>Time : </strong>{{ $event->time }}</p>
                                        <p><strong>Max Teams : </strong>{{ $event->max_teams_allowed }}</p>
                                        <p><strong>Entry Fee : </strong>{{ $event->entry_fee }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ================> Event schedule section end here <================== -->








    <!-- ================> Pricing section start here <================== -->
    <section class="pricing padding-top padding-bottom" id="pricing">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Choose the Best Plan</p>
                <h2>Pricing Plans</h2>
            </div>
            <div class="pricing__wrapper">
                <div class="row g-4 justify-content-center row-cols-lg-3 row-cols-md-2 row-cols-1">
                    <div class="col">
                        <div class="pricing__item" data-aos="fade-up" data-aos-duration="900">
                            <div class="pricing__inner">
                                <div class="pricing__head">
                                    <h4>PKR 2,000</h4>
                                </div>
                                <div class="pricing__body">
                                    <h4>Basic Plan</h4>
                                    <ul>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> Event Creation</p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> Participant
                                                Registration</p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> Basic Reporting</p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-times-circle"></i></span> Live Score Tracking
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="pricing__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="100">
                            <div class="pricing__inner">
                                <div class="pricing__head">
                                    <h4>PKR 5,000</h4>
                                </div>
                                <div class="pricing__body">
                                    <h4>Pro Plan</h4>
                                    <ul>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> All Basic Features
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> Live Score Tracking
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> Team Management</p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> Fixture Generation
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="pricing__item" data-aos="fade-up" data-aos-duration="900" data-aos-delay="200">
                            <div class="pricing__inner">
                                <div class="pricing__head">
                                    <h4>PKR 10,000</h4>
                                </div>
                                <div class="pricing__body">
                                    <h4>Premium Plan</h4>
                                    <ul>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> All Pro Features
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> Advanced Analytics
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> Customization
                                                Options</p>
                                        </li>
                                        <li>
                                            <p class="pricing__title"><span><i
                                                        class="fa-solid fa-check-circle"></i></span> Priority Support
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================> Pricing section end here <================== -->




    <!-- ================>Team section start here <================== -->
    <section class="team padding-top padding-bottom" id="speaker"
        style="background-image:url(assets/images/team/bg.png); text-align: center;">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Meet Our Featured Speaker!</p>
                <h2>Event Speaker</h2>
            </div>
            <div class="team__wrapper d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="team__item text-center" data-aos="fade-up" data-aos-duration="900">
                        <div class="team__item-inner">
                            <div class="team__item-thumb">
                                <img src="{{url('images/team/ahmad.jpeg')}}" alt="Ahmed Khan"
                                    class="img-fluid">
                            </div>
                            <div class="team__item-content">
                                <div class="team__item-author">
                                    <h4>Ahmed Khan</h4>
                                    <p>Sports Analyst & Event Organizer</p>
                                </div>
                                <p>Mr. Ahmed Khan, a renowned sports analyst and event organizer with over 15 years of
                                    experience,
                                    brings valuable insights and expertise to inspire teams and participants to achieve
                                    their best.</p>
                                <ul class="social d-flex justify-content-center gap-2">
                                    <li><a href="#" class="social__link"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#" class="social__link"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li><a href="#" class="social__link"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                    <li><a href="#" class="social__link"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================>Team section end here <================== -->





    <!-- ================>Sponsor section start here <================== -->
    <section class="sponsor padding-top padding-bottom bg--white">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Meet Our Bakers!</p>
                <h2>Our Sponsors</h2>
            </div>
            <div class="sponsor__wrapper">
                <div class="swiper sponsor__slider mb-4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="{{url('images/sponsor/easypaisa.jpg')}}" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="{{url('images/sponsor/jazzcash.jpg')}}" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="{{url('images/sponsor/three.jpg')}}" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="{{url('images/sponsor/easypaisa.jpg')}}" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="{{url('images/sponsor/jazzcash.jpg')}}" alt="sponsor image"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper sponsor__slider2" dir="rtl">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="{{url('images/sponsor/three.jpg')}}" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="{{url('images/sponsor/easypaisa.jpg')}}" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="{{url('images/sponsor/jazzcash.jpg')}}" alt="sponsor image"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor__item">
                                <a href="#"><img src="{{url('images/sponsor/three.jpg')}}" alt="sponsor image"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <a  class="default-btn move-right" href="#contact"> <span>Become a sponsor</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- ================>Sponsor section end here <================== -->





    <!-- ================FAQ section start here <================== -->
    <section id="faq" class="faq padding-top padding-bottom">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
                <p class="subtitle">Questions & Answers</p>
                <h2>Frequently Asked Questions (FAQs)</h2>
            </div>
            <div class="faq__wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="accordion" id="faqAccordion1">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="accordion__item" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="accordion__header" id="faq1">
                                            <button class="accordion__button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faqBody1"
                                                aria-expanded="false" aria-controls="faqBody1">
                                                Who can use Sportsync? <span class="plus-icon"></span>
                                            </button>
                                        </div>
                                        <div id="faqBody1" class="accordion-collapse collapse" aria-labelledby="faq1"
                                            data-bs-parent="#faqAccordion1">
                                            <div class="accordion__body">
                                                Sportsync is designed for event organizers, team managers, players, and
                                                sports enthusiasts looking for a streamlined way to manage sports
                                                events.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="accordion__item" data-aos="fade-up" data-aos-duration="1100">
                                        <div class="accordion__header" id="faq2">
                                            <button class="accordion__button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#faqBody2" aria-expanded="true"
                                                aria-controls="faqBody2">
                                                What types of events can I organize with Sportsync? <span
                                                    class="plus-icon"></span>
                                            </button>
                                        </div>
                                        <div id="faqBody2" class="accordion-collapse collapse show"
                                            aria-labelledby="faq2" data-bs-parent="#faqAccordion1">
                                            <div class="accordion__body">
                                                You can organize various sports events, including tournaments, leagues,
                                                and friendly matches, for multiple sports.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="accordion__item" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="accordion__header" id="faq3">
                                            <button class="accordion__button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faqBody3"
                                                aria-expanded="false" aria-controls="faqBody3">
                                                Is Sportsync accessible on mobile devices? <span
                                                    class="plus-icon"></span>
                                            </button>
                                        </div>
                                        <div id="faqBody3" class="accordion-collapse collapse" aria-labelledby="faq3"
                                            data-bs-parent="#faqAccordion1">
                                            <div class="accordion__body">
                                                Yes, Sportsync is fully responsive and can be accessed on smartphones,
                                                tablets, and desktops.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="accordion" id="faqAccordion2">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="accordion__item" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="accordion__header" id="faq4">
                                            <button class="accordion__button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faqBody4"
                                                aria-expanded="false" aria-controls="faqBody4">
                                                Is there a limit to the number of teams or players I can register? <span
                                                    class="plus-icon"></span>
                                            </button>
                                        </div>
                                        <div id="faqBody4" class="accordion-collapse collapse" aria-labelledby="faq4"
                                            data-bs-parent="#faqAccordion2">
                                            <div class="accordion__body">
                                                No, Sportsync supports an unlimited number of teams and players.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="accordion__item" data-aos="fade-up" data-aos-duration="1100">
                                        <div class="accordion__header" id="faq5">
                                            <button class="accordion__button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faqBody5"
                                                aria-expanded="true" aria-controls="faqBody5">
                                                Can I customize the platform for specific sports? <span
                                                    class="plus-icon"></span>
                                            </button>
                                        </div>
                                        <div id="faqBody5" class="accordion-collapse collapse" aria-labelledby="faq5"
                                            data-bs-parent="#faqAccordion2">
                                            <div class="accordion__body">
                                                Yes, Sportsync offers customization options to cater to the unique needs
                                                of different sports.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="accordion__item" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="accordion__header" id="faq6">
                                            <button class="accordion__button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#faqBody6" aria-expanded="false"
                                                aria-controls="faqBody6">
                                                How do I get started with Sportsync? <span class="plus-icon"></span>
                                            </button>
                                        </div>
                                        <div id="faqBody6" class="accordion-collapse collapse show"
                                            aria-labelledby="faq6" data-bs-parent="#faqAccordion2">
                                            <div class="accordion__body">
                                                Simply sign up, create your event, and invite participants! Our
                                                intuitive dashboard makes it easy to manage everything from
                                                registrations to scheduling.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================FAQ section end here <================== -->



    <!-- ================Venue section start here <================== -->
    <section id="contact" class="venue padding-top padding-bottom" id="venue">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="venue__content">
                        <h3>Event Venue</h3>
                        <p>Welcome to Sportsync, your premier platform for managing and hosting cricket events. We provide seamless event coordination, from player registration to tournament management, ensuring your cricket experience is unforgettable.</p>
                        <ul class="venue__list">
                            <li class="venue__list-item"><span><i class="fa-solid fa-location-dot"></i></span>
                                Hyderabad, Sindh - Pakistan
                                </li>
                            <li class="venue__list-item"><span><i class="fa-solid fa-phone"></i></span> (01)555 9214,
                                (+92) 312 3456 7891
                            </li>
                            <li class="venue__list-item"><span><i class="fa-solid fa-envelope"></i></span>
                            farain425@gmail.com </li>
                            <li class="venue__list-item"><span><i class="fa-solid fa-globe"></i></span>
                            http://127.0.0.1:8000/</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="venue__map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57662.4702013901!2d68.28563161445459!3d25.408010890197453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x394c7a040a2965e3%3A0xa8277e9c26fa1449!2sHyderabad%20City%2C%20Pakistan!5e0!3m2!1sen!2s!4v1739740933725!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!-- ================Venue section end here <================== -->





    <!-- ================> Footer section start here <================== -->
    <footer class="footer" style="background-image:url(assets/images/footer/bg.png) ;">
        <div class="footer__wrapper padding-top padding-bottom">
            <div class="container">
                <div class="footer__content text-center">
                    <a class="mb-4 d-inline-block" href="#home">
                        <img src="{{url('images/logo/logo.png')}}" alt="logo"></a>
                    <ul class="social justify-content-center">
                        <li class="social__item">
                            <a href="#" class="social__link"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="social__item">
                            <a href="#" class="social__link"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li class="social__item">
                            <a href="#" class="social__link"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="social__item">
                            <a href="#" class="social__link"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li class="social__item">
                            <a href="#" class="social__link"><i class="fab fa-facebook-f"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <div class="container">
                <div class="text-center py-4">
                    <p class=" mb-0">© 2025 | All Rights Reserved </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================> Footer section end here <================== -->



    <!-- vendor plugins -->
    <script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('js/all.min.js')}}"></script>
    <script src="{{url('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('js/swiper-bundle.min.js')}}"></script>
    <script src="{{url('js/aos.js')}}"></script>
    <script src="{{url('js/countdown.min.js')}}"></script>
    <script src="{{url('js/lightcase.js')}}"></script>
    <script src="{{url('js/purecounter_vanilla.js')}}"></script>
    <script src="{{url('js/custom.js')}}"></script>
</body>

</html>