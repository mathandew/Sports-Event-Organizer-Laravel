@include('layouts.header')
@include('layouts.navbar')

<style>
    .banner--overlay:after{
  height: 28% !important;
  top: 0 !important;
  left: 0 !important;
  background: linear-gradient(399deg, #32C2B0 58%, #ffffff) !important;
  opacity: 0.85 !important;

}
</style>

<section class="banner banner--overlay">

</section>

<section id="home" class="" style="margin-top:-180px">
    <div class="container">
        <div class="banner__wrapper">
            <div class="banner__content" data-aos="zoom-in" data-aos-duration="900">
                <h1 class="text-center" style="font-size:1.9em !important;">Profile</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
</section>
@include('layouts.footer')