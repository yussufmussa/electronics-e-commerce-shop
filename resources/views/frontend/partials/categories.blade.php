<!-- Start Categorie Area  -->
<div class="axil-categorie-area bg-color-white axil-section-gapcommon">
    <div class="container">
        <div class="section-title-wrapper">
            <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> Categories</span>
            <h2 class="title">Browse by Category</h2>
        </div>
        <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
            @foreach ($categories as $category)
            <div class="slick-single-layout">
                <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                    <a href="{{route('filter.category', $category->slug)}}">
                        <img class="img-fluid" src="{{asset('photos/category_photo/'.$category->category_photo)}}" alt="{{ $category->name }}">
                        <h6 class="cat-title">{{$category->name}}</h6>
                    </a>
                </div>
                <!-- End .categrie-product -->
            </div>
            @endforeach    
        </div>
    </div>
</div>
<!-- End Categorie Area  -->