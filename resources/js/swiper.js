import Swiper from 'swiper/bundle';

Livewire.on('initSwiper', function () {
    const swiper = new Swiper('.category__swiper', {
        slidesPerView: 5.5,
        spaceBetween: 16,
        // loop: true,

        // pagination: {
        //     el: '.swiper-pagination',
        //     clickable: true,
        // },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
})


const productThumbsSlider = new Swiper(".js-product-img-thumbs", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
});
const productImageSlider = new Swiper(".js-product-img", {
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: productThumbsSlider,
        slideThumbActiveClass: 'swiper-slide-active'
    },
});
