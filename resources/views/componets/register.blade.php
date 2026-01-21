
<section class="login-register section--lg">
    <div class="login-register__container container grid">
        <div class="register">
            <h3 class="section__title">Create an Account </h3>

                    <form action="{{ route('register.store') }}" method="POST" class="form grid">
                        @csrf

                        <input type="text" name="username" placeholder="Username" class="form__input">

                        <input type="email" name="email" placeholder="Your Email" class="form__input">

                        <input type="text" name="phone" placeholder="Phone Number" class="form__input">

                        <input type="password" name="password" placeholder="Your Password" class="form__input">

                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form__input">

                        <div class="form__btn flex js__bt">
                            <button class="btn" type="submit">Register</button>
                            <a class="btn" href="{{ route('login') }}">Continue Login</a>
                        </div>
                    </form>

        </div>
    </div>
</section>