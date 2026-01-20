
<section class="login-register section--lg">
    <div class="login-register__container container grid">
        <div class="register">
            <h3 class="section__title">Create an Account </h3>

            <form action="" class="form grid">
                <input type="text" placeholder="Username" class="form__input">
                <input type="email" placeholder="Your Email" class="form__input">
                <input type="password" placeholder="Your Password" class="form__input">
                <input type="password" placeholder="Confirm Password" class="form__input">
                <div class="form__btn flex js__bt">
                    <button class="btn">Register</button>
                    <a class="btn" href="{{ route('login') }}">Continue Login</a>
                </div>
            </form>
        </div>
    </div>
</section>