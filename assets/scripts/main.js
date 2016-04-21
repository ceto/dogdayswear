/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

  $(document).foundation();

  var $grid = $('.lookbookgrid').isotope({
    itemSelector: '.grid-item',
    percentPosition: true,
    masonry: {
      columnWidth: '.grid-sizer',
      gutter: 0
    }
  });

  $grid.imagesLoaded().progress( function() {
    $grid.isotope('layout');
  });





$('document').ready(function(){

  /*** Required data param for inputs ***/
  $('.woocommerce-billing-fields .validate-required').find('input[type=text], input[type=email]').prop('required','true');

  $('#createaccount').on('change',function(e) {
    if ($(this).prop('checked')) {
      $('.create-account .validate-required').find('input').prop('required','true');
    } else {
      $('.create-account .validate-required').find('input').prop('required','false');
    }
  });

  $('#ship-to-different-address-checkbox').on('change',function(e) {
    if ($(this).prop('checked')) {
      $('.woocommerce-shipping-fields .validate-required').find('input').prop('required','true');
    } else {
      $('.woocommerce-shipping-fields .validate-required').find('input').prop('required','false');
    }
  });

  /*** Thumbnail Carousel on Single product Page ***/
  var prodthumbsOwl = $('.prodthumbs');

  prodthumbsOwl.owlCarousel({
    pagination:false,
    navigation : false,

    items : 4, //10 items above 1000px browser width
    itemsDesktop : [1024,3], //5 items between 1000px and 901px
    itemsDesktopSmall : [768,3], // betweem 900px and 601px
    itemsTablet: [480,3], //2 items between 480 and 0
    itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });

  var prodOwl = $('.prod-carousel');

  prodOwl.owlCarousel({
    pagination:false,
    navigation : false,

    items : 6, //10 items above 1000px browser width
    itemsDesktop : [1280,5], //5 items between 1000px and 901px
    itemsDesktopSmall : [1024,4], // betweem 900px and 601px
    itemsTablet: [768,3], //2 items between 480 and 0
    itemsMobile : [480,2] // itemsMobile disabled - inherit from itemsTablet option
  });


  $('.lookbookgrid').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return /*item.el.children().attr('alt') + */'<small>&copy DogDays Yoga Wear</small>';
      }
    }
  });


  $('.woocommerce-main-image').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });




  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });

  $('.woocommerce-main-image').zoom({
      url: $('.woocommerce-main-image').attr('href'),
      magnify: 0.75,
   });

  $('.prodthumbs .item a').on('click', function(e) {
   e.preventDefault();
   $('.woocommerce-main-image').trigger('zoom.destroy');
   $('.woocommerce-main-image').css('min-height', $('.woocommerce-main-image .attachment-shop_single').height());
   $('.woocommerce-main-image').attr('href', $(this).attr('href') );
   $('.woocommerce-main-image .attachment-shop_single').replaceWith($(this).data('swapimage'));
   $('.woocommerce-main-image').zoom({
      url: $('.woocommerce-main-image').attr('href'),
      magnify: 0.75
   });

   setTimeout(function() { $('.woocommerce-main-image').css('min-height', 'auto'); } , 2000)
  });

});
