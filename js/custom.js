



$(document).ready(function(){
    $('.owl-carousel.first-carousel').owlCarousel({
        loop: true,
        dots: false,
        margin: 25,
        autoplay: true,
        slideTransition: 'linear',
        autoplayTimeout: 1000,
        autoplaySpeed: 4000,
        autoplayHoverPause: true,
        responsive: {
            0:{
                items:1
            },
            575:{
                items:1
            },
            767:{
                items:2
            },
            991:{
                items:3
            }
        }
    })

// wow js link
new WOW().init();




// $(document).ready(function(){
$(".owl-carousel.second-carousel").owlCarousel({
    loop:true,
    dots:false,
    margin: 25,
    rtl:true,
    autoplay: true,
    slideTransition: 'linear',
    autoplayTimeout: 1000,
    autoplaySpeed: 4000,
    autoplayHoverPause: true,
    responsive: {
        0:{
            items:1
        },
        575:{
            items:1
        },
        767:{
            items:2
        },
        991:{
            items:3
        }
    }
});

// });
})