import 'bootstrap/dist/js/bootstrap.bundle';
import axios from "axios";
import {Modal} from 'bootstrap';

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
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1200: {
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
new Swiper(".OnlineSwiper", {
    breakpoints: {
        0: {
            slidesPerView: 'auto',
            spaceBetween: 20
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20
        }
    },
    navigation: {
        nextEl: ".OnlineSwiper_nav .swiper-button-next",
        prevEl: ".OnlineSwiper_nav .swiper-button-prev"
    }
});

if (document.querySelector(".aside") && document.querySelector(".col-lg-8")) {
    let w = document.querySelector("body").clientWidth;
    let wc = document.querySelector(".col-lg-8").clientWidth;
    let wl = (w - wc) / 2 - 20;

    let aw = document.querySelector(".aside").clientWidth;
}


Livewire.on('image_uploaded', function () {
    let image_update_input = document.querySelector(".image_update_input");
    image_update_input.parentNode.parentNode.querySelector("button").click();
})



document.querySelectorAll(".video_block").forEach((video_block) => {
    let iframe = video_block.querySelector("iframe");
    if (iframe){
        let src = iframe.getAttribute("src");
        let video_play = video_block.querySelector(".video_play");
        if (video_play) {
            video_play.addEventListener("click", function () {
                iframe.setAttribute("src", src + "?autoplay=1");
                iframe.classList.remove("d-none");
            });
        }
    }
});


//     .addEventListener("click",function (){
//     let iframe = video_block.getElementById("iframe");
//     let src = iframe.getAttribute("src");
//     iframe.setAttribute("src",src  + "?autoplay=1");
//     iframe.classList.remove("d-none");
// });


let header_menu = document.querySelector(".header_menu");
if (header_menu) {
    let btn_for_menu = header_menu.querySelector(".btn_for_menu");
    let btn_close_for_menu = document.querySelector(".btn_close_for_menu");
    let nav = document.querySelector(".offcanvas");
    console.log(btn_close_for_menu);
    btn_for_menu.addEventListener("click", () => {
        nav.classList.add("show");
    });
    btn_close_for_menu.addEventListener("click", () => {
        nav.classList.remove("show");
    });
}

document.addEventListener("DOMContentLoaded", () => {
    let directions_index = document.querySelector(".directions_index");
    if (directions_index) {
        let show_more = directions_index.querySelector(".show_more");
        let max_h = directions_index.querySelector("a").offsetHeight * 3;
        let a_s = directions_index.querySelectorAll("a");
        if (show_more) {
            show_more.addEventListener("click", function () {
                a_s.forEach(function (item) {
                    item.style.display = "inline";
                })
            });
        }
        let index = a_s.length;
        while (directions_index.offsetHeight > max_h) {
            index--;
            a_s[index].style.display = "none";
        }
    }
});

document.querySelectorAll(".password_container").forEach(function (r) {
    console.log(r);
    r.querySelectorAll(".eye").forEach(function (e) {
        let input = r.querySelector("input");
        e.addEventListener("click", function () {
            r.classList.toggle("show");
            if (input.getAttribute("type") == "password") {
                input.setAttribute("type", "text");
            } else {
                input.setAttribute("type", "password");
            }
        });
    })
})


let webinarsCalc = {
    count: 0,
    price: 0,
    init: function () {
        if (!document.querySelector("#webinarSelectModal")) {
            return false;
        }
        document.querySelectorAll("#webinarSelectModal .course_item").forEach((item) => {
            let input = item.querySelector("input");
            item.addEventListener("click", (e) => {
                console.log(item);
                if (e.target != input) {
                    input.click();
                }
                this.update();
            })
        })
        document.querySelector("#webinarSelectModal .buyButton").addEventListener("click", function () {
            document.querySelector("#webinarSelectModal form").dispatchEvent(new Event("submit"));
        })
    },
    update: function () {
        this.count = 0;
        this.price = 0;
        let footer = document.querySelector("#webinarSelectModal .modal-footer");
        document.querySelectorAll("#webinarSelectModal .course_item").forEach((item) => {
            let input = item.querySelector("input");
            if (input.checked) {
                this.count++;
                this.price += parseInt(input.dataset.price);
            }
        })
        footer.querySelector(".co").textContent = this.count;
        footer.querySelector(".total").textContent = this.price;
        if (this.count > 0) {
            footer.classList.remove("d-none");
        } else {
            footer.classList.add("d-none");
        }
    }
}

webinarsCalc.init();


let input_tel_registr = document.querySelector(".input_tel_registr");
// let reg = /[A-Za-zA-Яа - яЁё]/g;
let reg = /[0-9]/g;

if (input_tel_registr) {
    input_tel_registr.addEventListener("input", function (e) {
        var checkingRegExp = new RegExp(/^([+\d].*)?\d$/g);
        // var checkingRegExp = new RegExp\^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$


        if (input_tel_registr.value.match(checkingRegExp) == null) {
            input_tel_registr.value = input_tel_registr.value.substr(0, input_tel_registr.length - 1)
        }
        // console.log(e.data);
        // this.value = this.value.replace(reg, '');
    })
}


// Youtube video link disabled

let players = document.querySelectorAll(".plyr");
players.forEach((player) => {
    player.classList.remove("plyr--youtube");
    // console.log(player)
})


let big_players = [];
document.querySelectorAll(".main_video_div .js-player").forEach(function (p){
    big_players.push(new Plyr(p));
})
document.querySelectorAll(".small_video .js-player").forEach(function (p){
    new Plyr(p);
})

//Course webinar videos modal

// let webinar_video_modal = document.getElementById("courseTrailersModal");
// if (webinar_video_modal) {
//     try{
//         let main_video_div = webinar_video_modal.querySelector(".main_video_div");
//         let player_absolute_divs = webinar_video_modal.querySelectorAll(".js-player-absolute-div");
//
//         // let webinar_video_players = webinar_video_modal.querySelectorAll(".webinar_video_player");
//         let player_titles = webinar_video_modal.querySelectorAll(".webinar_video_player p");
//         let player_iframes = webinar_video_modal.querySelectorAll(".webinar_video_player .plyr iframe");
//
//         let main_video_title = main_video_div.querySelector("p").textContent;
//         let main_player_iframe = main_video_div.querySelector(" .plyr iframe");
//
//         player_absolute_divs.forEach(function (item) {
//             item.addEventListener("click",function (){
//                 let id = item.dataset.id;
//                 document.querySelectorAll(".big_video").forEach(function (bv){
//                     for(let p of big_players){
//                         p.pause();
//                     }
//                     if(bv.dataset.id == id){
//                         bv.classList.remove('hide');
//                     }else{
//                         bv.classList.add('hide');
//                     }
//                 })
//             })
//         })
//         webinar_video_modal.addEventListener('hidden.bs.modal', event => {
//             for(let p of big_players){
//                 p.pause();
//             }
//         })
//     }catch (e) {
//         console.log(e)
//     }
//
//
// }

let send_mail  = document.querySelector('.send_mail')
send_mail.addEventListener('click',function () {
    setTimeout(function () {
        document.querySelector('.success_h5').classList = 'd-none'
    },5000)

})

let cartSuccessModal = new Modal('#cartSuccessModal');
document.querySelectorAll("form").forEach(function (form){
    let action = form.getAttribute("action");
    if(action && (action.indexOf("addManyToCart") > -1 || action.indexOf("addToCart") > -1)){
        form.addEventListener("submit",function (e){
            e.preventDefault();
            let formData = new FormData(form);
            axios.post(form.getAttribute("action"), formData)
                .then(response => {
                    // console.log(response.data);
                    cartSuccessModal.show();
                })
                .catch(error => {
                    console.error('Произошла ошибка при отправке формы', error);
                });
        })
    }

})
