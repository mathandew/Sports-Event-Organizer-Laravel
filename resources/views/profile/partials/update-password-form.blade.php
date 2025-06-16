<div class="container">
    <h1 class="text-center mb-4">Update Password</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Current Password -->
            <div class="col-md-6 mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control" required autocomplete="current-password">
                @if ($errors->updatePassword->has('current_password'))
                    <small class="text-danger">{{ $errors->updatePassword->first('current_password') }}</small>
                @endif
            </div>

            <!-- New Password -->
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password">
                @if ($errors->updatePassword->has('password'))
                    <small class="text-danger">{{ $errors->updatePassword->first('password') }}</small>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
                @if ($errors->updatePassword->has('password_confirmation'))
                    <small class="text-danger">{{ $errors->updatePassword->first('password_confirmation') }}</small>
                @endif
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>

        <!-- Success Message -->
        @if (session('status') === 'password-updated')
            <div class="text-center mt-3">
                <p class="text-success">Password updated successfully.</p>
            </div>
        @endif
    </form>
</div>
