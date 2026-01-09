
<section class="cart section--lg container">
    <div class="table__container">
        <table class="table">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Remove</th>
            </tr>

            <tr>
                <td>
                    <img src="{{ asset('img/product-1-2.jpg') }}" alt="" class="table__img">
                </td>
                <td>
                    <h3 class="table__title">J.crew Mercantile Women's Short-Sleeve</h3>
                    <p>Maboriasam in a tonto nesciung eget distingy magndapibus</p>
                </td>
                <td>
                    <span class="table__price">$110</span>
                </td>
                <td><input type="number" value="3" class="quantity"></td>

                <td><span class="table__subtotal">$220</span></td>
                <td><i class="fa-solid fa-trash table__trash"></i></td>
            </tr>
        </table>
    </div>
    <div class="cart__actions">
        <a href="" class="btn flex btn--md">
            <i class="fa-solid fa-shuffle"></i> Update Cart
        </a>
        <a href="" class="btn flex btn--md">
            <i class="fa-solid fa-bag-shopping"></i> Continue Shopping
        </a>
    </div>

    <div class="divider">
        <i class="fa-solid fa-fingerprint"></i>
    </div>

    <div class="cart__group grid">
        <div>
            <div class="cart_shipping">
                <h3 class="section__title">Calculate Shipping</h3>

                <form action="" class="form grid">
                    <input type="text" placeholder="State / Country" class="form__input">

                    <div class="form__group grid">
                        <input type="text" placeholder="City" class="form__input">
                        <input type="text" placeholder="PostCode / ZIP" class="form__input">
                    </div>

                    <div class="form__btn">
                        <button class="btn flex btn__sm">
                            <i class="fa-solid fa-shuffle"></i> Update
                        </button>
                    </div>
                </form>
            </div>

            <div class="cart__coupon">
                <h3 class="section__title">Apply Coupon</h3>

                <form action="" class="coupon__form form grid">
                    <div class="form__group grid">
                        <input type="text" class="form__input" placeholder="Enter Your Coupon">
                        
                        <div class="form__btn">
                            <button class="btn flex btn__sm">
                                <i class="fa-solid fa-tag"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="cart__total">
            <div class="section__title">Cart Totals</div>

            <table class="cart__total-table">
                <tr>
                    <td><span class="cart__total-title">Cart Subtotal</span></td>
                    <td><span class="cart__total-price">$240</span></td>
                </tr>

                <tr>
                    <td><span class="cart__total-title">Shipping</span></td>
                    <td><span class="cart__total-price">$10</span></td>
                </tr>

                <tr>
                    <td><span class="cart__total-title">Total</span></td>
                    <td><span class="cart__total-price">$250</span></td>
                </tr>
            </table>

            <a href="{{ route('checkout') }}" class="btn flex btn--md">
                <i class="fa-solid fa-box"></i> Proceed To CheckOut
            </a>
        </div>
    </div>
</section>