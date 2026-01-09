const navMenu = document.getElementById('nav_menu'),
  navToggle = document.getElementById('nav-toggle'),
  navClose = document.getElementById('nav__close');

  if(navToggle){
    navToggle.addEventListener('click', () => {
      navMenu.classList.add('show-menu');
    });
  }

  if(navClose){
    navClose.addEventListener('click', () => {
      navMenu.classList.remove('show-menu');
    });
  }

function imgGallery() {
    const mainImg = document.querySelector('.details__img'),
      smallImg = document.querySelectorAll('.details__small-img');

    smallImg.forEach((img) => {
        img.addEventListener('click', function(){
            mainImg.src = this.src;
        })
    })
}

imgGallery();

var swiperCategories = new Swiper(".categories__container", {
  slidesPerView: 2,
  spaceBetween: 24,
  loop: true,
  navigation: {
    nextEl: ".category-next", // Unique class
    prevEl: ".category-prev", // Unique class
  },
  breakpoints: {
    320: { slidesPerView: 1, spaceBetween: 24,},
    350: { slidesPerView: 2, spaceBetween: 24,},
    768: { slidesPerView: 3, spaceBetween: 24,},
    992: { slidesPerView: 4, spaceBetween: 24,},
    1200: { slidesPerView: 5, spaceBetween: 24,},
    1400: { slidesPerView: 6, spaceBetween: 24,},
  },
});


var swiperProducts = new Swiper(".new__arrivals .swiper", {
    slidesPerView: 2,
    spaceBetween: 24,
    loop: true,
    navigation: {
        nextEl: ".category-next",
        prevEl: ".category-prev",
    },
    breakpoints: {
        320: { slidesPerView: 1, spaceBetween: 24,},
        520: { slidesPerView: 2, spaceBetween: 24,},
        768: { slidesPerView: 3, spaceBetween: 24,},
        992: { slidesPerView: 4, spaceBetween: 24,},
        1200: { slidesPerView: 5, spaceBetween: 24,},
        1400: { slidesPerView: 6, spaceBetween: 24,},
    },
});


const tabs =  document.querySelectorAll('[data-target]'),
    tabContents = document.querySelectorAll('[content]');

tabs.forEach((tab) => {
    tab.addEventListener('click', () =>{
        const target = document.querySelector(tab.dataset.target);
        tabContents.forEach((tabContents) => {
            tabContents.classList.remove('active-tab');
        });

        target.classList.add('active-tab');

        tabs.forEach((tab) => {
            tab.classList.remove('active-tab');
        });

        tab.classList.add('active-tab');
    });
});


// Works for multiple rows
document.querySelectorAll('.num-wrap-horizontal').forEach(function (wrap) {
  const input = wrap.querySelector('input[type="number"]');
  const left = wrap.querySelector('.left');
  const right = wrap.querySelector('.right');

  left.addEventListener('click', () => {
    const step = parseFloat(input.step) || 1;
    const min = input.min !== '' ? parseFloat(input.min) : null;
    let val = parseFloat(input.value || 0) - step;
    if (min !== null && val < min) val = min;
    input.value = val;
    input.dispatchEvent(new Event('change'));
  });

  right.addEventListener('click', () => {
    const step = parseFloat(input.step) || 1;
    const max = input.max !== '' ? parseFloat(input.max) : null;
    let val = parseFloat(input.value || 0) + step;
    if (max !== null && val > max) val = max;
    input.value = val;
    input.dispatchEvent(new Event('change'));
  });
});
