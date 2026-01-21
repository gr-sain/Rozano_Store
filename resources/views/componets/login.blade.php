<section class="login-register section--lg">
    <div class="login-register__container container grid">
        <div class="login">
            <h3 class="section__title">Login</h3>

            <form action="{{ route('login.store') }}" method="POST" class="form grid">
                @csrf

                <input type="text" name="login" placeholder="Your Email" class="form__input" required>
                <input type="password" name="password" placeholder="Your Password" class="form__input" required> 

                <div class="form__btn flex js__bt">
                    <button class="btn" type="submit">Login</button>
                    <a class="btn" href="{{ route('register') }}">Create New Account</a>
                </div>
            </form>
        </div>
    </div>
</section>
