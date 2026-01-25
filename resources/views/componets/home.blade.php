<section class="home section--lg">
    <div class="home__container container grid">
        @php
            $banner = $banners->where('status', 1)->first();
        @endphp

        @if($banner)
            <div class="home__content">
                <span class="home__subtitle">{{ $banner->subtitle }}</span>
                <h1 class="home__title">
                    {{ $banner->title }} <span>{{ $banner->highlight_title }}</span>
                </h1>

                <p class="home__descrition">
                    {{ $banner->description }}
                </p>
                <a href="{{ $banner->button_link }}" class="btn">{{ $banner->button_text }}</a>
            </div>

            <img src="{{ asset('storage/'.$banner->image) }}" alt="{{ $banner->title }}" class="home__img">
        @else
            {{-- Default content if no active banner --}}
            <div class="home__content">
                <span class="home__subtitle">Hot Promotions</span>
                <h1 class="home__title">
                    Fashion Treding <span>Great Collaction</span>
                </h1>

                <p class="home__descrition">
                    Save more with coupon & up to 20% off
                </p>
                <a href="#" class="btn">Shop Now</a>
            </div>

            <img src="{{ asset('img/home-img.png') }}" alt="" class="home__img">
        @endif
    </div>
</section>