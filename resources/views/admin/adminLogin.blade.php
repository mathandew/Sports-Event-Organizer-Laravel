<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportsync</title>

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


    <section id="home" class="banner" style="background:linear-gradient(399deg, #32C2B0 58%, #ffffff) !important;height:40em !important;;">
        <div class="container">
            <div class="banner__wrapper">
                <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">
                    <h3>Admin Login</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <form action="{{ route('admin.login.submit') }}" method="POST"
                                    class="p-3 border rounded">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-sm"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-sm" required>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary btn-sm w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                @include('layouts.footer')
