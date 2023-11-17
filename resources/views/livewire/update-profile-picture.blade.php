        <form wire:submit.prevent="updateProfilePicture" enctype="multipart/form-data" class="account-details-form">
        <div class="form-group">
            @if ($currentPhoto)
                <img src="{{ asset($currentPhoto) }}" alt="Profile Picture" width="150px" height="150px" class="rounded">
            @endif
        </div>

        <div class="form-group">
            <label for="photo" class="form-label">Profile Picture</label>
            <input wire:model="photo" type="file" class="form-control @error('photo') is-invalid @enderror">
            @error('photo')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>

        @if($success)
                <div class="alert alert-success">
                    Saved Succefully
                </div>
                @endif
                <div class="form-group mb--0">
        <input type="submit" class="axil-btn" value="Save Changes">
    </div>
    </form>
