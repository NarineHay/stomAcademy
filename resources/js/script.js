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
        1400: {
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


document.querySelectorAll(".video_block").forEach((video_block)=>{
        let iframe = video_block.querySelector("iframe");
        let src = iframe.getAttribute("src");
        let video_play = video_block.querySelector(".video_play");
        video_play.addEventListener("click",function (){
            iframe.setAttribute("src",src  + "?autoplay=1");
            iframe.classList.remove("d-none");
        });
});


//     .addEventListener("click",function (){
//     let iframe = video_block.getElementById("iframe");
//     let src = iframe.getAttribute("src");
//     iframe.setAttribute("src",src  + "?autoplay=1");
//     iframe.classList.remove("d-none");
// });


let header_menu = document.querySelector(".header_menu");
if (header_menu){
    let btn_for_menu = header_menu.querySelector(".btn_for_menu");
    let btn_close_for_menu = header_menu.querySelector(".btn_close_for_menu");
    let nav = header_menu.querySelector(".navbar");
    btn_for_menu.addEventListener("click", ()=>{
       nav.classList.add("show");
    });
    btn_close_for_menu.addEventListener("click", ()=>{
       nav.classList.remove("show");
    });
}

document.addEventListener("DOMContentLoaded", () => {
    let directions_index = document.querySelector(".directions_index");
    let show_more = directions_index.querySelector(".show_more");
    let max_h = directions_index.querySelector("a").offsetHeight * 3;
    let a_s = directions_index.querySelectorAll("a");
    show_more.addEventListener("click",function (){
        a_s.forEach(function (item){
            item.style.display = "inline";
        })
    });
    let index = a_s.length;
    while(directions_index.offsetHeight > max_h){
        index--;
        a_s[index].style.display = "none";
    }
});

document.querySelectorAll(".password_container").forEach(function (r){
    console.log(r);
    r.querySelectorAll(".eye").forEach(function (e){
        let input = r.querySelector("input");
        e.addEventListener("click",function (){
            r.classList.toggle("show");
            if(input.getAttribute("type") == "password"){
                input.setAttribute("type","text");
            }else{
                input.setAttribute("type","password");
            }
        });
    })
})
