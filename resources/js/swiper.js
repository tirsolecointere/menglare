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
