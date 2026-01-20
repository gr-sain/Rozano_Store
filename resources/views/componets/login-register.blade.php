

<section class="login-register section--lg">
    <div class="login-register__container container grid">
        <div class="login">
            <h3 class="section__title">Login</h3>

            <form action="" class="form grid">
                @csrf
                <input type="email" placeholder="Your Email" class="form__input">
                <input type="password" placeholder="Your Password" class="form__input">
                <div class="form__btn flex js__bt">
                    <button class="btn">Login</button>
                    <a class="btn" href="{{ route('register') }}">Create New Account</a>
                </div>
            </form>
        </div>
    </div>
</section>