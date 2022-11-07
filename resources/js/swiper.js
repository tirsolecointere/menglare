import Swiper from 'swiper/bundle';

const swiper = new Swiper('.category__swiper', {
    slidesPerView: 4,
    spaceBetween: 16,
    // loop: true,

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
