@extends('frontend.layouts.base')
@section('title', $setting->first()->title)
@section('keywords', $setting->first()->keywords)
@section('description', $setting->first()->meta_description)
@section('extra_style')
<!-- JSON-LD structured data for the home page -->
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Organization",
		"url": "http://www.binelectroinicstore.com",
		"logo": "{{asset('photos/general/'.$setting->first()->logo)}}"
	}
</script>

<!-- Og tags -->
<meta property="og:title" content="{{ $setting->first()->title }}">
<meta property="og:description" content="{{$setting->first()->meta_description}}">
<meta property="og:image" content="{{ asset('photos/general/'.$setting->first()->logo)}}">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:site_name" content="{{ $setting->first()->name }}">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<!-- End Og tags -->
@endsection

@section('contents')

		@include('frontend.partials.hero')
        @include('frontend.partials.categories')
		@include('frontend.partials.top')
		@include('frontend.partials.why')


@endsection

@section('extra_js_script')
@endsection