if($(".swiper").length > 0){
    $.getScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.0/swiper-bundle.js", function(){
        $(".swiper").each(function() {
            let swiper;
            let _this = $(this),
                container = _this.find(".swiper-container");
            if (_this.hasClass("clients-slider")) {
                swipes = new Swiper(container.prevObject[0], {
                    speed: 1000,
                    slidesPerView:5,
                    spaceBetween: 30,
                    autoplay: true,
                    centeredSlides: true,
                    loop: true,
                    pagination: {
                        el: $(this).find(".swiper-pagination")[0],
                    },
                    // breakpoints: {
                    //     0: {
                    //         slidesPerView: 1,
                    //     },
                    //     550: {
                    //         slidesPerView: 2,
                    //     },
                    //     850: {
                    //         slidesPerView: 3,
                    //     },
                    //     1240: {
                    //         slidesPerView: 4,
                    //         centeredSlides: false,
                    //     },
                    //     1380: {
                    //         slidesPerView: 5,

                    //     }
                    // }
                });
                // if(window.innerWidth < 768){
                //     swipes.destroy();
                // }
            }
        });
    });
}