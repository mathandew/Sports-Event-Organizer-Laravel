<!DOCTYPE html>
<html lang="en">

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

    <!-- main css for template -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

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
                        <a href="index.html">
                            <img src="{{url('images/logo/logo.png')}}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ========== Multipage Header Section Ends Here========== -->
    <section class="page-header bg--cover" style="background:linear-gradient(399deg, #32C2B0 58%, #ffffff) !important;height:40em !important;">
        <div class="container">
            <div class="page-header__content text-center">
                <h1>Registration Successful</h1>
                <p>A verification email has been sent to your email address. Please check your inbox and verify your
                    email to complete the registration process.</p>

            </div>
        </div>
    </section>
    @include('layouts.footer')
