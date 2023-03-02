import 'bootstrap/dist/js/bootstrap.bundle';

new Swiper(".videoPopularSwiper", {
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
    },
    navigation: {
        nextEl: ".videoPopularSwiper_nav .swiper-button-next",
        prevEl: ".videoPopularSwiper_nav .swiper-button-prev",
    },
});

new Swiper(".AdditionsSwiper", {
    breakpoints: {
        0: {
            slidesPerView: 'auto',
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
    navigation: {
        nextEl: ".AdditionsSwiper_nav .swiper-button-next",
        prevEl: ".AdditionsSwiper_nav .swiper-button-prev",
    },
});

new Swiper(".WatchedSwiper", {
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
    // slidesPerView: 3,
    // spaceBetween: 20,
    navigation: {
        nextEl: ".WatchedSwiper_nav .swiper-button-next",
        prevEl: ".WatchedSwiper_nav .swiper-button-prev",
    },
});


if(document.querySelector(".aside") && document.querySelector(".col-lg-8")){
    let w = document.querySelector("body").clientWidth;
    let wc = document.querySelector(".col-lg-8").clientWidth;
    let wl = (w - wc) / 2 - 20;

    let aw = document.querySelector(".aside").clientWidth;
}


Livewire.on('image_uploaded',function (){
    let image_update_input = document.querySelector(".image_update_input");
    image_update_input.parentNode.parentNode.querySelector("button").click();
})

