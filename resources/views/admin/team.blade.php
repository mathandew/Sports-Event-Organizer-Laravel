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

<section class="page-header banner--overlay">
    <div class="container">
        <div class="page-header__content text-center">
            <h1>Team Details</h1>
            <p><strong>Team Name:</strong> {{ $team->team_name }}</p>
            <p><strong>Team Email:</strong> {{ $team->team_email }}</p>
            <p><strong>Contact Number:</strong> {{ $team->contact_number }}</p>
        </div>
    </div>
</section>

<section class="team padding-bottom" id="speaker"
        style="background-image:url(assets/images/team/bg.png)">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="900">
            <h2>Players</h2>
        </div>
        <div class="team__wrapper">
            <div class="row g-4">
                <table id="usersTable" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Invitation Status</th>
                            <th>Created At</th>
                            @if(Auth::user()->role == 'admin')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($team->players as $player)
                            <tr id="row-{{ $player->id }}">
                                <td>{{ $player->id }}</td>
                                <td>{{ $player->name }}</td>
                                <td>{{ $player->email }}</td>
                                <td id="status-{{ $player->id }}">{{ $player->invitation == 'accepted' ? 'Accepted' : 'Not Accepted' }}</td>
                                <td>{{ $player->created_at }}</td>
                                @if(Auth::user()->role == 'admin')
                                <td>
                                    @if($player->invitation == 'not accepted')
                                        <button class="accept-btn btn-success" 
                                                data-id="{{ $player->id }}">
                                            Accept
                                        </button>
                                        <button class="reject-btn btn-dark" 
                                                data-id="{{ $player->id }}" disabled>
                                            Reject
                                        </button>
                                    @elseif($player->invitation == 'accepted')
                                        <button class="accept-btn btn-dark" 
                                                data-id="{{ $player->id }}" disabled>
                                            Accept
                                        </button>
                                        <button class="reject-btn btn-danger" 
                                                data-id="{{ $player->id }}">
                                            Reject
                                        </button>
                                    @endif
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

<script>
    $(document).ready(function () {
        // Destroy existing DataTable before reinitializing
        if ($.fn.DataTable.isDataTable('#usersTable')) {
            $('#usersTable').DataTable().destroy();
        }

        // Initialize DataTable with 15 rows per page
        $('#usersTable').DataTable({
            "pageLength": 15,
            "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
            "processing": true,
            "serverSide": false
        });

        // Accept button click handler
        $('#usersTable').on('click', '.accept-btn', function () {
            let playerId = $(this).data('id');
            $.ajax({
                url: "{{ route('admin.acceptPlayer') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: playerId
                },
                success: function (response) {
                    if (response.status === 'success') {
                        $('#status-' + playerId).text('Accepted');
                        $('#row-' + playerId + ' .accept-btn').prop('disabled', true).removeClass('btn-success').addClass('btn-dark');
                        $('#row-' + playerId + ' .reject-btn').prop('disabled', false).removeClass('btn-dark').addClass('btn-danger');
                    }
                },
                error: function () {
                    alert('Something went wrong.');
                }
            });
        });

        // Reject button click handler
        $('#usersTable').on('click', '.reject-btn', function () {
            let playerId = $(this).data('id');
            $.ajax({
                url: "{{ route('admin.rejectPlayer') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: playerId
                },
                success: function (response) {
                    if (response.status === 'success') {
                        $('#status-' + playerId).text('Not Accepted');
                        $('#row-' + playerId + ' .reject-btn').prop('disabled', true).removeClass('btn-danger').addClass('btn-dark');
                        $('#row-' + playerId + ' .accept-btn').prop('disabled', false).removeClass('btn-dark').addClass('btn-success');
                    }
                },
                error: function () {
                    alert('Something went wrong.');
                }
            });
        });
    });
</script>



