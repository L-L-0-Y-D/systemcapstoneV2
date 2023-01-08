$('.owl-carousel').owlCarousel({
    loop: false,
    margin: 0,
    responsiveClass: true,
    responsive: {
        0:{
            items: 1,
        },
        576:{
            items: 2,
        },
        768:{
            items: 3,
        },
        1100:{
            items: 4,
        },
        1400:{
            items: 5,
            loop: false,
        }
    }
});