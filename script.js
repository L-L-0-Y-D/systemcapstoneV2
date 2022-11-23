$('.owl-carousel').owlCarousel({
    loop: false,
    margin: 0,
    responsiveClass: true,
    responsive: {
        0:{
            items: 1,
        },
        576:{
            items: 3,
        },
        768:{
            items: 4,
        },
        1100:{
            items: 5,
        },
        1400:{
            items: 6,
            loop: false,
        }
    }
});