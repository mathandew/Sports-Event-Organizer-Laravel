@include('layouts.header')
@include('layouts.navbar')

<style>
    .banner--overlay:after{
  height: 103px !important;
  top: 0 !important;
  left: 0 !important;
  background: linear-gradient(399deg, #32C2B0 58%, #ffffff) !important;
  opacity: 0.85 !important;
  width: 100% !important;

}
</style>


<!-- ================> Banner section start here <================== -->
<section id="home" class="banner banner--overlay">
    <div class="container">
        <div class="banner__wrapper">
            <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">

                @if(Auth::user()->role == 'participant' && Auth::user()->organizer_status == 'pending')
                    <h3>Your Request to Become an Organizer has been sent!</h3>
                @endif

                @if(Auth::user()->role == 'participant' && Auth::user()->organizer_status == 'rejected')
                        <h3>Your Request to Become an Organizer has been Rejected!</h3>
                @endif

                <!-- Admin Dashboard Start -->

                @if(Auth::user()->role == 'admin')
                <h1>SportSync Management System</h1>
                <div class="container">
                <div class="banner__wrapper">
                <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">
                    <div class="row">
                    <div class="col-6 mt-2 mb-2 mx-auto">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Admin Dashboard</h5>
      <ul class="list-group">
        <li class="list-group-item">
          <h6 class="card-subtitle mb-2 text-muted">Event Management</h6>
          <p class="card-text">As an admin, you can manage and oversee all events on the platform. Review and approve event requests, ensuring they meet the platform's standards and guidelines.</p>
        </li>
        <li class="list-group-item">
          <h6 class="card-subtitle mb-2 text-muted">Organizers</h6>
          <p class="card-text">You have control over event organizers. Approve or reject their registration, monitor their activities, and ensure they comply with the platform’s policies.</p>
        </li>
        <li class="list-group-item">
          <h6 class="card-subtitle mb-2 text-muted">Team Management</h6>
          <p class="card-text">Manage the teams participating in events. Ensure that teams follow the platform's rules, and take necessary actions in case of violations.</p>
        </li>
      </ul>
    </div>
  </div>
</div>


                    </div>
                </div>
                </div>
                </div>

                @endif
                 
                <!-- Admin Dashboard End -->

                <!-- Participant Dashboard Start -->

                 @if(Auth::user()->role == 'participant')
                <h1>SportSync System Management</h1>
                <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4 border">
                <div class="card-body">
                    <h4 class="card-title text-start fw-bold">Apply as a Team</h4>
                    <p class="card-text text-start mt-2">
                        Become a <strong>Team Captain</strong> and lead your squad to victory! 
                        Create your team, invite players, and participate in upcoming cricket 
                        tournaments. Manage your roster, strategize effectively, and compete 
                        for the championship title.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card p-4 border">
                <div class="card-body">
                    <h4 class="card-title text-start fw-bold">Apply as an Organizer</h4>
                    <p class="card-text text-start mt-2">
                        Want to host cricket tournaments? Apply as an <strong>Organizer</strong> 
                        by submitting a request. Upon admin approval, you’ll gain full access 
                        to event creation, team management, and scheduling tools for seamless 
                        tournament organization.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

                
                @endif

                <!-- Participant Dashboard End -->

                <!-- Organizer Dashboard Start -->

                 @if(Auth::user()->role == 'organizer')
                <h1>Welcome As a Organizer</h1>
                <div class="container">
                <div class="banner__wrapper">
                <div class="banner__content" data-aos="zoom-in" data-aos-duration="900">
                    <div class="row">
                        <div class="col-8 mx-auto mt-2 mb-2">
                        <div class="card" style="">
                          <!-- <img src="..." class="card-img-top" alt="..."> -->
                          <div class="card-body">
                            <h5 class="card-title">Instructions</h5>
                            <p class="card-text" style="text-align:left;">Once you're approved as an organizer, please be aware that the admin holds full control over the platform and can review or reject your requests at any time. 
                              If your actions are flagged, your privileges may be revoked, preventing you from taking further actions until the matter is thoroughly reviewed.It’s crucial to ensure that all events
                               you create are legitimate and comply with platform standards. Any event that doesn’t meet these criteria may be subject to suspension.If an account is blocked, it will remain under investigation
                                and can only be reopened after a thorough review. Additionally, if any violations of the platform’s rules are detected, your account may be permanently suspended.For any queries or assistance, 
                                <br>
                                <b>feel free to reach out to us.</b></p>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>

                @endif

                <!-- Organizer Dashboard End -->
                
            </div>
        </div>
    </div>
</section>
<!-- ================> Banner section end here <================== -->

@include('layouts.footer')