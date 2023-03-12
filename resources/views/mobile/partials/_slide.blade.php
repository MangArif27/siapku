<div class="splide single-slider slider-has-arrows slider-no-dots" id="single-slider-2">
    <div class="splide__track">
        <div class="splide__list">
            @foreach ($slide as $slid)
            <div class="splide__slide">
                <div data-card-height="175" class="card mb-0 shadow-l">
                    <img src="{{ url('image/Slide/'.$slid->image) }}">
                    <div class="card-overlay bg-gradient opacity-60"></div>
                    </img>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>