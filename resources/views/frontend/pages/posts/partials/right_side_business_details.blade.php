<div class="col-lg-4 col-md-12 col-sm-12 col-12">

    <!-- Searchbard -->
    <div class="single_widgets widget_search">
        <h4 class="title">Search</h4>
        @if($adSponsoredDetails)
        <a href="{{$adSponsoredDetails->link}}" target="_blank">
            <img src="{{asset('photos/ads/'.$adSponsoredDetails->banner)}}" class="img-fluid">
        </a>
        @endif

    </div>

    <!-- Trending Posts -->
    <div class="single_widgets widget_thumb_post">
        <h4 class="title">Other Posts</h4>
        <ul>
            @foreach($relatedPosts as $post)
            <li>
                <span class="left">
                    <img src="{{asset('photos/posts/'.$post->thumbnail)}}" alt="{{$post->name}}" class="">
                </span>
                <span class="right">
                    <a class="feed-title" href="{{route('post.details', $post->slug)}}">{{$post->name}}</a>
                    <!-- <span class="post-date"><i class="ti-calendar"></i></span> -->
                </span>
            </li>
            @endforeach

        </ul>
    </div>


</div>