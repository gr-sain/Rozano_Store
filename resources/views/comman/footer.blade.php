   <footer class="footer container">
        <div class="footer__container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">
                    <img src="{{ asset('img/logo.svg') }}" alt="" class="footer__logo-img">
                </a>
                <h4 class="footer__subtitle">Contact</h4>

                <p class="footer__description">
                    <span>Address:</span> 562 wellington Road, Street 32 San Francisco
                </p>

                <p class="footer__description">
                    <span>Phone:</span> +91 9950741003 / +91 7878711906
                </p>

                <p class="footer__description">
                    <span>Hours:</span> 10:00 - 18:00, Mon - Sat
                </p>

                <div class="footer__social">
                    <h4 class="footer__subtitle">Follow Me</h4>

                    <div class="footer__social-links">
                        <a href="#">
                            <img src="{{ asset('img/icon-facebook.svg') }}" alt="" class="footer__social-icon">
                        </a>

                        <a href="#">
                            <img src="{{ asset('img/icon-twitter.svg') }}" alt="" class="footer__social-icon">
                        </a>

                        <a href="#">
                            <img src="{{ asset('img/icon-instagram.svg') }} " alt="" class="footer__social-icon">
                        </a>

                        <a href="#">
                            <img src="{{ asset('img/icon-pinterest.svg') }} " alt="" class="footer__social-icon">
                        </a>

                        <a href="#">
                            <img src="{{ asset('img/icon-youtube.svg') }} " alt="" class="footer__social-icon">
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Address</h3>

                <ul class="footer__links">
                    <li><a href="#" class="footer__link">About Us</a></li>
                    <li><a href="#" class="footer__link">Delivery Information</a></li>
                    <li><a href="#" class="footer__link">Privacy Policy</a></li>
                    <li><a href="#" class="footer__link">Terms & Conditions</a></li>
                    <li><a href="#" class="footer__link">Contact Us</a></li>
                    <li><a href="#" class="footer__link">Support Center</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">My Account</h3>

                <ul class="footer__links">
                    <li><a href="#" class="footer__link">Sign In</a></li>
                    <li><a href="#" class="footer__link">View Cart</a></li>
                    <li><a href="#" class="footer__link">My Wishlist</a></li>
                    <li><a href="#" class="footer__link">Track My Order</a></li>
                    <li><a href="#" class="footer__link">Help</a></li>
                    <li><a href="#" class="footer__link">Order</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Secured Payment Gateways</h3>

                <img src="{{ asset('img/payment-method.png') }}" alt="" class="payment__img">
            </div>
        </div>

        <div class="footer__bottom">
            <p class="copyright">&copy; 2023 Evara. All rights reserved</p>
            <span class="designer">Designed by Crypticalcoder</span>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>