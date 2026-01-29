<section class="products section--lg container">
    <p class="tool__products">We found <span>{{ $products->total() }}</span> items for you!</p>

    <div class="product__container grid">
        @foreach ($products as $product)
            <div class="product__item">
                <div class="product__banner">
                    <a href="{{ route('shop.index', $product->slug) }}" class="product__images">
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
        @endforeach
    </div>

    @if ($products->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($products->onFirstPage())
                <li><span class="pagination__link disabled"><i class="fa-solid fa-angles-left"></i></span></li>
            @else
                <li><a href="{{ $products->previousPageUrl() }}" class="pagination__link"><i class="fa-solid fa-angles-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                @if ($page == $products->currentPage())
                    <li><a href="#" class="pagination__link active">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a></li>
                @else
                    <li><a href="{{ $url }}" class="pagination__link">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a></li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($products->hasMorePages())
                <li><a href="{{ $products->nextPageUrl() }}" class="pagination__link icon">
                    <i class="fa-solid fa-angles-right"></i>
                </a></li>
            @else
                <li><span class="pagination__link disabled icon"><i class="fa-solid fa-angles-right"></i></span></li>
            @endif
        </ul>
    @endif
</section>