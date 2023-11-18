<div class="default-height ph-item">
        <div class="slider-main owl-carousel">
            @foreach($sliders as $slider)
            <div class="bg-image one" style="background-image: url({{asset('photos/sliders/'.$slider->name)}});">
                <!-- <div class="slide-content slide-animation">
                    <h1>Casual Clothing</h1>
                    <h2>lifestyle / clothing / hype</h2>
                </div> -->
            </div>
            @endforeach
        </div>
    </div>