(function ($) {
    "use strict";

    /*====  Document Ready Function =====*/
    jQuery(document).ready(function($){

        // Scroll To Top
        $(window).on("scroll",function(){
            var pagescroll = $(window).scrollTop();
            if(pagescroll > 100){
                $(".scroll-to-top").addClass("scroll-to-top-visible");

            }else{
                $(".scroll-to-top").removeClass("scroll-to-top-visible");
            }
        });

        $(".scroll-to-top").on("click", function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });

        //Mobile Menu
        $("#main-menu").slicknav({
            allowParentLinks: true,
            prependTo: '#mobile-menu-wrap',
            label: 'Menu',
        });

        $(".mobile-menu-trigger").on("click", function(e) {
            $(".mobile-menu-container").addClass("menu-open");
            e.stopPropagation();
        });

        $(".mobile-menu-close").on("click", function(e) {
            $(".mobile-menu-container").removeClass("menu-open");
            e.stopPropagation();
        });

        //Header Search
        $(".td-header-src-btn").on("click", function(e) {
            $(".header-search-wrapper").addClass("search-open");
            e.stopPropagation();
        });

        $(".search-close").on("click", function(e) {
            $(".header-search-wrapper").removeClass("search-open");
            e.stopPropagation();
        });

        //Grid Post Masonry
        $('.layout-grid .all-posts-wrapper, .layout-grid-rs .all-posts-wrapper, .layout-grid-ls .all-posts-wrapper').imagesLoaded( function() {
            $('.layout-grid .all-posts-wrapper, .layout-grid-rs .all-posts-wrapper, .layout-grid-ls .all-posts-wrapper').masonry({
                itemSelector: '.single-post-item',
                percentPosition: true,
            });
        });

        // Gallery Post Slider
        $('.post-gallery-slider').slick({
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 1500,
            dots: true,
            arrows: true,
            prevArrow: '<i class="slick-arrow slick-prev flaticon-long-right-arrow"></i>',
            nextArrow: '<i class="slick-arrow slick-next flaticon-long-right-arrow"></i>',
        });

        // Popup Video
        $(".td-video-button").magnificPopup({
            type: 'video'
        });

        // Popup Image
        $('.td-popup-image').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        // Post Print
        $(document).on('click', '.print-button', function(e){
            console.log();
            e.preventDefault();
            window.print();
            return false;
        });

        // WooCommerce Shop view
        $('#td-shop-view-mode li').on('click',function(){
            $('body').removeClass('td-product-grid-view').removeClass('td-product-list-view');

            if ( $(this).hasClass('td-shop-list')) {
                $('body').addClass('td-product-list-view');
                Cookies.set('td-shop-view', 'list');
            }
            else{
                $('body').addClass('td-product-grid-view');
                Cookies.remove('td-shop-view');
            }
            return false;
        });

        $('.td-product-thumb-image img').removeAttr('sizes');
        $('[class*="td-"] svg').removeAttr('height width');

        $('.td-shop-page-add-to-cart a').empty();
        $(".related.products .products, .upsells.products .products").slick({
            slidesToShow: 3,//relater_product_data.slide_column,
            autoplay: true,
            autoplaySpeed: "5000", //interval
            speed: 1500, // slide speed
            dots: false,
            arrows: true,
            prevArrow: '<i class="slick-arrow slick-prev flaticon-long-right-arrow"></i>',
            nextArrow: '<i class="slick-arrow slick-next flaticon-long-right-arrow"></i>',
            infinite: true,
            pauseOnHover: false,
            centerMode: false,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 2,
                        arrows: true,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2, //768-991
                        arrows: true,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1, // 0 -767
                        arrows: false,
                    }
                }
            ]
        });
        
        new WOW().init();

    });

    /*====  Window Load Function =====*/
    jQuery(window).on('load', function() {
        //Preloader
        $('.preloader-wrapper').delay(1000).fadeOut('slow');
        setTimeout(function() {
            $('.site').addClass('loaded');
        }, 500);
    });

}(jQuery));
