$(document).ready(function() {

    $nav=$('.nav');
    $toggleCollapse=$('.toggle-collapse');

    /**click event nav */
    $toggleCollapse.click(function() {
        $nav.toggleClass('collapse');
    })

    // owl-carousel blog
    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay:false,
        autoplayTimeout:3000,
        dots:false,
        nav:true,
        navText:[$('.owl-navigation .owl-nav-prev'),$('.owl-navigation .owl-nav-next')]
    });

    //AOS instance
    AOS.init();
});