@extends('backend.admin.layouts.base')
@section('title', 'Edit User information')
@section('contents')

    @include('backend.admin.profile.partials.update-profile-picture')
    @include('backend.admin.profile.partials.update-profile-information-form')
    
    @include('backend.admin.profile.partials.update-password-form')

</div>

@endsection