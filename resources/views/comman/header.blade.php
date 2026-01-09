<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Ecommerce Website</title>
</head>
<body>
    <header class="header">
        <div class="header__top">
            <div class="header__container container">
                <div class="header__contact">
                    <span>(+91) - 9950741003</span>

                    <span> OUR Location</span>
                </div>

                <p class="header__alert-news">
                    Super Value Deals - Save more With Coupons
                </p>

                <a href="#" class="header__top-action">
                    login & Register
                </a>
            </div>
        </div>
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="{{ asset('img/logo.svg') }}" alt="" class="nav__logo-img">
            </a>

            <div class="nav__menu" id="nav_menu">
                <div class="nav__menu-top">
                    <a href="index.html" class="nav__menu-logo">
                        <img src="{{ asset('img/logo.svg') }}" alt="Logo">
                    </a>
                    <div class="nav__close" id="nav__close">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#" class="nav__link active-link">Home</a>
                    </li>

                    <li class="nav__item">
                        <a href="shop.html" class="nav__link">Shop</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">My Account</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Compare</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Login</a>
                    </li>
                </ul>
                <div class="header__search">
                    <input 
                    type="text" 
                    placeholder="Search for items" 
                    class="form__input"
                    />

                    <button class="search__btn">
                        <img src="{{ asset('img/search.png') }}" alt="">
                    </button>
                </div>

            </div>

            <div class="header__user-actions">
                <a href="" class="header__action-btn">
                    <img src="{{ asset('img/icon-heart.svg') }}" alt="">
                    <span class="count">3</span>
                </a>

                <a href="" class="header__action-btn">
                    <img src="{{ asset('img/icon-cart.svg') }}" alt="">
                    <span class="count">3</span>
                </a>
                <div class="header__action-btn nav__toggle" id="nav-toggle">
                    <img src="{{ asset('img/menu-burger.svg') }}" alt="">
                </div>
            </div>
        </nav>

    </header>