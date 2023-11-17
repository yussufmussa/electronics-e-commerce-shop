<form wire:submit.prevent="updateProfile" class="account-details-form">@csrf
    <div class="form-group">
        <label>Email</label>
        <input wire:model="email" class="form-control @error('email') is-invalid @enderror" type="email" disabled>
        @error('email')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Full Name</label>
        <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text">
        @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    @if($success)
    <div class="alert alert-success">
        Updated Succefully
    </div>
    @endif
    <div class="form-group mb--0">
        <input type="submit" class="axil-btn" value="Save Changes">
    </div>
</form>