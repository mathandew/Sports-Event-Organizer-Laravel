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
    <header class="header-section" style="background:linear-gradient(399deg, #32C2B0 58%, #ffffff);">
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


    <!-- ================> Page header start here <================== -->
    <!-- <section class="page-header bg--cover" style="background-image: url(assets/images/header/bg.jpg);">
        <div class="container">
            <div class="page-header__content text-center">
                <h2 class="text-uppercase">Sign Up</h2>
                <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section> -->
    <!-- ================> Page header end here <================== -->




    <!-- ==========signup Section start Here========== -->
    <div class="account padding-top padding-bottom">
        <div class=" container">
            <div class="row g-5 align-items-center flex-md-row-reverse">
                <div class="col-lg-5 mx-auto">
                    <div class="account__wrapper">
                        <h3 class="title">Sign Up</h3>
                        <!-- <form class="account__form"> -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="account__form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInput-user" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" placeholder="name">
                                <label for="floatingInput-user">Name</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" id="email" name="email" required
                                    placeholder="name@example.com">
                                <label for="email">Email address</label>
                                <small id="email-status" class="text-danger"></small>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password"
                                    required autocomplete="new-password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword2"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password">
                                <label for="floatingPassword2">Confirm Password</label>
                            </div>
                            <div class="form-group">
                                <!-- <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                                    <div class="checkgroup">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Accept Terms & Policy</label>
                                    </div>
                                </div> -->
                            </div>
                            <div class="form-group">
                                <button class="d-block default-btn move-top signup"><span>Signup Now</span></button>
                            </div>
                        </form>
                        <div class="account-bottom">
                            <p class="d-block cate pt-10"> Have an Account? <a href="{{ route('login') }}"> Sign
                                    in</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========signup Section ends Here========== -->
    @include('layouts.footer')
    <script>
        $(document).ready(function () {
            $('#email').on('input', function () {
                let email = $(this).val();
                $('#email-status').text(''); // Clear previous message

                if (email.length > 0) {
                    $.ajax({
                        url: "{{ route('check-email') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            email: email
                        },
                        success: function (response) {
                            if (response.exists) {
                                $('#email-status').text('Email is already taken.');
                                $('.signup').prop('disabled', true);
                            }
                        },
                        error: function () {
                            $('#email-status').text('Something went wrong. Please try again.');
                        }
                    });
                }
            });
        });
    </script>