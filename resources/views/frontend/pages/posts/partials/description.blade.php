<div class="block-card mb-4">
    <div class="block-card-header">
        <h2 class="widget-title">{{$post->title}}</h2>
        <div class="stroke-shape"></div>
    </div><!-- end block-card-header -->
    <div class="block-card-body">

        <div class="font-weight-medium line-height-30 pb-3 description-container">
            <img src="{{asset('photos/posts/'.$post->thumbnail)}}" alt="" class="img-fluid">
            <p>
                {!! $post->body !!}
            </p>

            <h3 class="widget-title mt-3">Share this post:</h3>
            <ul class="social-profile social-profile-styled">
                <li><a href="#" class="facebook-bg" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="lab la-facebook-f"></i></a></li>
                <li><a href="#" class="twitter-bg" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="lab la-twitter"></i></a></li>
                <li><a href="#" class="instagram-bg" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="lab la-instagram"></i></a></li>
                <li><a href="#" class="youtube-bg" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="la la-youtube"></i></a></li>
                <li><a href="#" class="behance-bg" data-toggle="tooltip" data-placement="top" title="Behance"><i class="la la-behance"></i></a></li>
                <li><a href="#" class="dribbble-bg" data-toggle="tooltip" data-placement="top" title="Dribbble"><i class="la la-dribbble"></i></a></li>
            </ul>
        </div>

    </div><!-- end block-card-body -->
</div><!-- end block-card -->