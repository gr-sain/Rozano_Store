
    <section class="categories container section">
        <h3 class="section__title"><span>Popular</span> Categories</h3>

        <div class="categories__container swiper">
            <div class="swiper-wrapper">
                @foreach($categories as $category) 
                    <a href="#" class="category__item swiper-slide"> 
                        <div class="category__icon"> 
                            <i class="{{ $category->icon }}"></i> 
                        </div> 
                        <h3 class="category__title"> {{ $category->name }} </h3> 
                    </a>
                @endforeach
            </div>

            <div class="swiper-button-next">
                <i class="fa-solid fa-angle-right category-next"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="fa-solid fa-angle-left category-prev"></i>
            </div>
        </div>
    </section>  
