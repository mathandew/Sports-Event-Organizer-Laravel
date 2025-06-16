
<div class="container">
    <h1 class="text-center mb-4">Update User Details</h1>
    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">
            <!-- Name -->
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <!-- Email -->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            <!-- City -->
            <div class="col-md-6 mb-3">
                <label for="city" class="form-label">City</label>
                @if (!Auth::user()->city)
                <input type="text" name="city" id="city" class="form-control" value="{{ $user->city }}">
                @else
                <input type="text" name="city" id="city" class="form-control" value="{{ $user->city }}" readonly>
                @endif
            </div>

            <!-- Role -->
            <div class="col-md-6 mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select" disabled>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="organizer" {{ $user->role === 'organizer' ? 'selected' : '' }}>Organizer</option>
                    <option value="participant" {{ $user->role === 'participant' ? 'selected' : '' }}>Participant</option>
                </select>
            </div>

            <!-- CNIC -->
            <div class="col-md-6 mb-3">
                <label for="cnic" class="form-label">CNIC</label>
                @if (Auth::user()->cnic == null)
                <input type="text" name="cnic" id="cnic" class="form-control" value="{{ $user->cnic }}">
                @else
                <input type="text" name="cnic" id="cnic" class="form-control" value="{{ $user->cnic }}" readonly>
                @endif
            </div>

            <!-- Phone Number -->
            <div class="col-md-6 mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                @if (!Auth::user()->cnic)
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $user->phone_number }}">
                @else
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $user->phone_number }}" readonly>
                @endif
            </div>

            <!-- Player Role -->
            @if (Auth::user()->role == 'participant')
            <div class="col-md-6 mb-3">
                <label for="player_role" class="form-label">Player Role</label>
                <select name="player_role" id="player_role" class="form-select">
                    <option value="batsman" {{ $user->player_role === 'batsman' ? 'selected' : '' }}>Batsman</option>
                    <option value="bowler" {{ $user->player_role === 'bowler' ? 'selected' : '' }}>Bowler</option>
                    <option value="all-rounder" {{ $user->player_role === 'all-rounder' ? 'selected' : '' }}>All-Rounder</option>
                </select>
            </div>
            @endif

            <!-- Age -->
            <div class="col-md-6 mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" value="{{ $user->age }}">
            </div>

            <!-- Location -->
            <div class="col-md-6 mb-3">
                <label for="location" class="form-label">Location</label>
                @if (!Auth::user()->phone_number)
                <input type="text" name="location" id="location" class="form-control" value="{{ $user->location }}">
                @else
                <input type="text" name="location" id="location" class="form-control" value="{{ $user->location }}" readonly>
                @endif
            </div>

            <!-- Profile Picture -->
            <div class="col-md-6 mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                @if($user->profile_picture)
                    <img src="{{ asset('uploads/' . $user->profile_picture) }}" alt="Profile Picture" width="100" class="mt-2">
                @endif
            </div>

            <!-- Verification Status -->
            <div class="col-md-6 mb-3">
                <label for="verification_status" class="form-label">Verification Status</label>
                <select name="verification_status" id="verification_status" class="form-select" disabled>
                    <option value="1" {{ $user->verification_status ? 'selected' : '' }}>Verified</option>
                    <option value="0" {{ !$user->verification_status ? 'selected' : '' }}>Not Verified</option>
                </select>
            </div>

            <!-- Organizer Status -->
            <!-- <div class="col-md-6 mb-3">
                <label for="organizer_status" class="form-label">Organizer Status</label>
                <select name="organizer_status" id="organizer_status" class="form-select" disabled>
                    <option value="accepted" {{ $user->organizer_status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ $user->organizer_status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="pending" {{ $user->organizer_status === 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div> -->
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Update User</button>
        </div>
    </form>
</div>
