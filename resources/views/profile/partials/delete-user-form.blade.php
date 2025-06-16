<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="text-center text-danger fw-bold mb-4">Delete Account</h2>
            <p class="text-muted text-center mb-4">
                Once your account is deleted, all of its resources and data will be permanently deleted. 
                Before deleting your account, please download any data or information that you wish to retain.
            </p>
            <div class="text-center">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                    Delete Account
                </button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Account Deletion</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <p class="mb-4">
                            Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted.
                            Please enter your password to confirm.
                        </p>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="form-control" 
                                placeholder="Enter your password" 
                                required 
                            />
                            @if ($errors->userDeletion->has('password'))
                                <small class="text-danger">{{ $errors->userDeletion->first('password') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
