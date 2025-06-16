@include('layouts.header')
@include('layouts.navbar')







    <!-- ================> Banner section start here <================== -->
    <section id="home" class="banner banner--overlay" style="background-image: url(assets/images/banner/bg.jpg);" >
        <div class="container">
            <div class="banner__wrapper">
                <div class="banner__content text-center" data-aos="zoom-in" data-aos-duration="900">
                    <h1>Organizers</h1>

                    <table id="usersTable" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($organizers as $organizer)
                                <tr id="row-{{ $organizer->id }}">
                                    <td>{{ $organizer->id }}</td>
                                    <td>{{ $organizer->name }}</td>
                                    <td>{{ $organizer->email }}</td>
                                    <td id="status-{{ $organizer->id }}">{{ $organizer->organizer_status }}</td>
                                    <td>{{ $organizer->created_at }}</td>
                                    <td>
                                    @if ($organizer->organizer_status == 'pending')
                                    <button class="accept-btn btn-success" 
                                                data-id="{{ $organizer->id }}">
                                            Accept
                                        </button>
                                        <button class="reject-btn btn-danger" 
                                                data-id="{{ $organizer->id }}">
                                            Reject
                                        </button>
                                    @endif
                                        @if ($organizer->organizer_status == 'accepted')
                                        <button class="accept-btn btn-dark" 
                                                data-id="{{ $organizer->id }}" disabled>
                                            Active
                                        </button>
                                        <button class="reject-btn btn-danger" 
                                                data-id="{{ $organizer->id }}">
                                            Deactive
                                        </button>
                                        @elseif($organizer->organizer_status == 'rejected')
                                        <button class="accept-btn btn-success" 
                                                data-id="{{ $organizer->id }}" 
                                                >
                                                Active
                                        </button>
                                        <button class="reject-btn btn-dark" 
                                                data-id="{{ $organizer->id }}" disabled>
                                                Deactive
                                        </button>
                                        @endif
                                        

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
    <!-- ================> Banner section end here <================== -->




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

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function () {
        $('#usersTable').DataTable();

        // Accept Button click handler
        $('.accept-btn').click(function () {
            let organizerId = $(this).data('id');

            $.ajax({
                url: "{{ route('admin.acceptOrganizer') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: organizerId
                },
                success: function (response) {
                    if (response.status === 'success') {
                        // Update the status text
                        $('#status-' + organizerId).text('accepted');
                        // Disable buttons
                        $('#row-' + organizerId + ' .accept-btn').prop('disabled', true);
                        $('#row-' + organizerId + ' .reject-btn').prop('disabled', false);
                        
                        // Change button colors
                        $('#row-' + organizerId + ' .accept-btn').removeClass('btn-success').addClass('btn-dark');
                        $('#row-' + organizerId + ' .reject-btn').removeClass('btn-dark').addClass('btn-danger');
                    }
                },
                error: function (xhr) {
                    alert('Something went wrong.');
                }
            });
        });

        // Reject Button click handler
        $('.reject-btn').click(function () {
            let organizerId = $(this).data('id');

            $.ajax({
                url: "{{ route('admin.rejectOrganizer') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: organizerId
                },
                success: function (response) {
                    if (response.status === 'success') {
                        // Update the status text
                        $('#status-' + organizerId).text('rejected');
                        // Disable buttons
                        $('#row-' + organizerId + ' .accept-btn').prop('disabled', false);
                        $('#row-' + organizerId + ' .reject-btn').prop('disabled', true);

                        // Change button colors
                        $('#row-' + organizerId + ' .accept-btn').removeClass('btn-dark').addClass('btn-success');
                        $('#row-' + organizerId + ' .reject-btn').removeClass('btn-dark').addClass('btn-dark');
                    }
                },
                error: function (xhr) {
                    alert('Something went wrong.');
                }
            });
        });
    });
</script>

</body>

</html>