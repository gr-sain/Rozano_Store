<section class="product section container">
    <div class="tab__btns">
        <span class="tab__btn active-tab" onclick="filterProducts(event, 'featured')">Featured</span>
        <span class="tab__btn" onclick="filterProducts(event, 'popular')">Popular</span>
        <span class="tab__btn" onclick="filterProducts(event, 'new')">New Added</span>
    </div>

    <div class="tab__items">
        {{-- FEATURED TAB --}}
        <div class="tab__item active-tab" content id="featured">
            <div class="product__container grid">
                @foreach ($products as $product)
                    @if($product->is_featured) 
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="{{ route('products.index', $product->slug) }}" class="product__images">
                                    <img src="{{ asset('storage/'. $product->thumbnail) }}" alt="{{ $product->name }}" class="product__img">
                                    <img src="{{ asset('storage/'. $product->hover_thumbnail) }}" alt="{{ $product->name }}" class="product__img hover">
                                </a>
                                
                                <div class="product__actions">
                                    <a href="#" class="action__btn" aria-label="Quick View">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Add To Wishlist">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Compare">
                                        <i class="fa-solid fa-shuffle"></i>
                                    </a>
                                </div>

                                @if($product->is_sale && $product->discount_percent)
                                    <div class="product__badge light-pink">
                                        -{{ $product->discount_percent }}%
                                    </div>
                                @elseif($product->is_hot)
                                    <div class="product__badge light-green">Hot</div>
                                @endif
                            </div>

                            <div class="product__content">
                                <span class="product__category">{{ $product->category->name ?? 'Clothing' }}</span>
                                <a href="{{ route('products.index', $product->slug) }}">
                                    <h3 class="product__title">{{ $product->name }}</h3>
                                </a>
                                
                                <div class="product__price flex">
                                    <span class="new__price">${{ number_format($product->price, 2) }}</span>
                                    @if($product->old_price && $product->old_price > $product->price)
                                        <span class="old__price">${{ number_format($product->old_price, 2) }}</span>
                                    @endif
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- POPULAR TAB --}}
        <div class="tab__item" content id="popular">
            <div class="product__container grid">
                @foreach ($products as $product)
                    @if($product->is_popular)
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="{{ route('products.index', $product->slug) }}" class="product__images">
                                    <img src="{{ asset('storage/'. $product->thumbnail) }}" alt="{{ $product->name }}" class="product__img">
                                    <img src="{{ asset('storage/'. $product->hover_thumbnail) }}" alt="{{ $product->name }}" class="product__img hover">
                                </a>
                                
                                <div class="product__actions">
                                    <a href="#" class="action__btn" aria-label="Quick View">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Add To Wishlist">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Compare">
                                        <i class="fa-solid fa-shuffle"></i>
                                    </a>
                                </div>

                                @if($product->is_sale && $product->discount_percent)
                                    <div class="product__badge light-pink">
                                        -{{ $product->discount_percent }}%
                                    </div>
                                @elseif($product->is_hot)
                                    <div class="product__badge light-green">Hot</div>
                                @endif
                            </div>

                            <div class="product__content">
                                <span class="product__category">{{ $product->category->name ?? 'Clothing' }}</span>
                                <a href="{{ route('products.index', $product->slug) }}">
                                    <h3 class="product__title">{{ $product->name }}</h3>
                                </a>
                                
                                <div class="product__price flex">
                                    <span class="new__price">${{ number_format($product->price, 2) }}</span>
                                    @if($product->old_price && $product->old_price > $product->price)
                                        <span class="old__price">${{ number_format($product->old_price, 2) }}</span>
                                    @endif
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- NEW ADDED TAB --}}
        <div class="tab__item" content id="new">
            <div class="product__container grid">
                @foreach ($products as $product)
                    @if($product->is_new)
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="{{ route('products.index', $product->slug) }}" class="product__images">
                                    <img src="{{ asset('storage/'. $product->thumbnail) }}" alt="{{ $product->name }}" class="product__img">
                                    <img src="{{ asset('storage/'. $product->hover_thumbnail) }}" alt="{{ $product->name }}" class="product__img hover">
                                </a>
                                
                                <div class="product__actions">
                                    <a href="#" class="action__btn" aria-label="Quick View">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Add To Wishlist">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Compare">
                                        <i class="fa-solid fa-shuffle"></i>
                                    </a>
                                </div>

                                @if($product->is_sale && $product->discount_percent)
                                    <div class="product__badge light-pink">
                                        -{{ $product->discount_percent }}%
                                    </div>
                                @elseif($product->is_hot)
                                    <div class="product__badge light-green">Hot</div>
                                @endif
                            </div>

                            <div class="product__content">
                                <span class="product__category">{{ $product->category->name ?? 'Clothing' }}</span>
                                <a href="{{ route('products.index', $product->slug) }}">
                                    <h3 class="product__title">{{ $product->name }}</h3>
                                </a>
                                
                                <div class="product__price flex">
                                    <span class="new__price">${{ number_format($product->price, 2) }}</span>
                                    @if($product->old_price && $product->old_price > $product->price)
                                        <span class="old__price">${{ number_format($product->old_price, 2) }}</span>
                                    @endif
                                </div>

                                <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
<script>
    window.filterProducts = function(event, type) {
    
        // remove active from all buttons
        document.querySelectorAll('.tab__btn').forEach(btn => {
            btn.classList.remove('active-tab');
        });
    
        // active current button
        event.target.classList.add('active-tab');
    
        // hide all tabs
        document.querySelectorAll('.tab__item').forEach(item => {
            item.classList.remove('active-tab');
        });
    
        // show selected tab
        const targetTab = document.getElementById(type);
        if (targetTab) {
            targetTab.classList.add('active-tab');
        }
    };
</script>
