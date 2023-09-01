const bannerSwiper = new Swiper('.banner-swiper', {
    loop: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    pagination: {
        clickable: true,
        el: ".swiper-pagination",
    },
    grabCursor: true,
    effect: "creative",
    creativeEffect: {
        prev: {
            shadow: true,
            translate: ["-20%", 0, -1],
        },
        next: {
            translate: ["100%", 0, 0],
        },
    },
})
const customerSwiper = new Swiper('.customer-swiper', {
    loop: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,

    },
    pagination: {
        clickable: true,
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    slidesPerView: 1,
    slidesPerGroup: 6,
    breakpoints: {
        500: {
            slidesPerView: 2,
            slidesPerGroup: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            slidesPerGroup: 3,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 4,
            slidesPerGroup: 4,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 5,
            slidesPerGroup: 5,
            spaceBetween: 20,
        },
        1400: {
            slidesPerView: 6,
            slidesPerGroup: 6,
            spaceBetween: 20,
        },
    }
})