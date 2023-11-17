<div class="col-12">
    <h5 class="title">Password Change</h5>
    <form wire:submit.prevent="updatePassword" class="account-details-form">
        @csrf
        <div class="form-group">
            <label>Current Password</label>
            <input wire:model="currentPassword" id="currentPassword" class="form-control @error('currentPassword') is-invalid @enderror" type="password">
            @error('currentPassword')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input wire:model="password" id="password" class="form-control @error('password') is-invalid @enderror" type="password">
            @error('password')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Confirm New Password</label>
            <input wire:model="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password">
            @error('password_confirmation')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>

        @if($success)
        <div class="alert alert-success">
            Password Updated Succefully
        </div>
        @endif
        <div class="form-group mb--0">
            <input type="submit" class="axil-btn" value="Save Changes">
        </div>
    </form>
    </div>