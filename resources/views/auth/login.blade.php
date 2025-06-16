@include('layouts.header')


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
            <h2 class="text-uppercase">Sign In</h2>
            <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sign In</li>
                </ol>
            </nav>
        </div>
    </div>
</section> -->
<!-- ================> Page header end here <================== -->




<!-- ==========signin Section start Here========== -->
<div class="account padding-top padding-bottom">
    <div class=" container">
        <div class="row g-5 align-items-center flex-md-row-reverse">
            <div class="col-lg-5 mx-auto">
                <div class="account__wrapper">
                    <h3 class="title">Sign In</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- <form class="account__form"> -->
                    <form class="account__form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" name="email" placeholder="name@example.com">
                            <label>Email address</label>
                            <div class="text-danger email-error" style="display: none;"></div>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <label>Password</label>
                            <div class="text-danger password-error" style="display: none;"></div>
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="d-block default-btn move-top"><span>Signin Now</span></button>
                        </div>

                    </form>
                    <div class="account-bottom">
                        <p class="d-block cate pt-10">Don’t Have any Account?
                            @if (Route::has('register'))
                                    <a href="{{ route('register') }}"> Sign Up</a>
                                </p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==========signin Section ends Here========== -->

@include('layouts.footer')

<script>
    $(document).ready(function () {
        $('input[name="email"], input[name="password"]').on('keyup', function () {
            let email = $('input[name="email"]').val();
            let password = $('input[name="password"]').val();
            let emailErrorContainer = $('.email-error');
            let passwordErrorContainer = $('.password-error');

            $.ajax({
                url: "{{ url('/check-credentials') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    email: email,
                    password: password
                },
                success: function (response) {
                    if (response.email_error) {
                        emailErrorContainer.text(response.email_error).show();
                    } else {
                        emailErrorContainer.text('').hide();
                    }

                    if (response.password_error) {
                        passwordErrorContainer.text(response.password_error).show();
                    } else {
                        passwordErrorContainer.text('').hide();
                    }
                }
            });
        });
    });
</script>