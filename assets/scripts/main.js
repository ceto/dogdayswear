/* ========================================================================
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  $(document).foundation();

  /**** SWATCHES ********/

  //Takes a select object and parses it for its values and options
  function parseSelect(selectObj) {
    var select = $(selectObj);

    var listObj = {};
    listObj.classNames = 'swatchlist ' + select.attr('id');
    listObj.originalSelect = 'pa_meret'; //Store our select object reference here

    listObj.items = [];
    select.children('option').each(function () {
        var _element = $(this);
        //Discard any empty values
        if (_element.val() !== "") {
            var item = {
                'label': _element.text(),
                'id': _element.val(),
                'disabled': _element[0].hasAttribute('disabled'),
                'selected': (_element.val()===select.val())
            };
            listObj.items.push(item);
        }
    });
    return listObj;
  }

  //Creates all the html needed and returns an element
  function createSwatches(list) {
      var html;
      var div = $(document.createElement('div')).addClass('swatch-wrapper');
      var element = $(document.createElement('ul'));
      element.addClass(list.classNames);
      element.attr('data-original-select', list.originalSelect);

      for (var i = 0; i < list.items.length; i++) {
          var list_item = document.createElement('li');
          $(list_item).append(document.createElement('a'));
          $(list_item).children('a').attr('id',list.items[i].id);
          $(list_item).children('a').attr('title', list.items[i].label);
          $(list_item).children('a').text(list.items[i].label);
          if (list.items[i].disabled) {
            $(list_item).addClass('disabled');
          }
          if (list.items[i].selected) {
            $(list_item).addClass('actual');
          }
          element.append(list_item);

          div.append(element);
          html = div;
      }
      return html;
  }

  function swatchSelected(list_item) {
    if ($(list_item).attr('id') !== undefined) {
        var _select = $(list_item).parents('ul').attr('data-original-select');
        $('#' + _select).val($(list_item).attr('id')).change();
        $(list_item).parent().addClass('actual').siblings().removeClass('actual');
    }
  }

  var selectObj = document.getElementById('pa_meret');
  setTimeout(function(){
      var listObject = parseSelect(selectObj);
      var swatchSelector = createSwatches(listObject);
      $(selectObj).before(swatchSelector);
      $('.swatch-wrapper').on('click', 'a', function (e) {
        if (!$(this).parent().hasClass('disabled')) {
          swatchSelected(this);
        }
      });

  }, 1000);




  /***** EOF SWATCHES ****/

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


(function($) {
  $.slugi = function(input) {
    var output = 'colvariant colvariant--tiny colvariant--' + input.replace(/ /gi, '-').toLowerCase();
    return output;
  };
})(jQuery);



$('document').ready(function($){

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

  $(document.body).on('change', 'input[name="payment_method"]', function() {
    $('body').trigger('update_checkout');
    //$.ajax( $fragment_refresh );
  });


  /*** Thumbnail Carousel on Catalog Item ***/
  function catcallback(event) {
    $('.prcard__thumb').on('mouseenter', '.catalogthumbs', function(ev) {
      $(this).trigger('next.owl.carousel');
    }).on('mouseleave', '.catalogthumbs', function(event) {
      $(this).trigger('prev.owl.carousel');
    });
  }

  $('.catalogthumbs').owlCarousel({
    //nav : true,
    items:1,
    //loop:true,
    onInitialized: catcallback,
    smartSpeed: 0,
    transitionStyle : 'fade'
  });



  /*** Thumbnail Carousel on Single product Page ***/

  $('.prod-carousel').owlCarousel({
    nav: true,
    navText: ['<i class="icon icon--chevron-left"></i>', '<i class="icon icon--chevron-right"></i>'],
    responsive:{
        0:{
            items:2,
            margin:10,
        },
        550:{
            items:3,
            margin:15,
        },
        768:{
            items:4,
            margin:15,
            stagePadding:15
        },
        1024:{
            items:5,
            margin:15,
            stagePadding:15
        },
        1200:{
            items:6,
            margin:20,
            stagePadding:20
        },
        1600:{
            items:6,
            margin:30,
            stagePadding:30
        }
    }
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
      touch: false
   });

  $('.prodthumbs__item a').on('click', function(e) {
    e.preventDefault();
    $('.prodthumbs__item a').removeClass('is-active');
    $(this).addClass('is-active');
    $('.woocommerce-main-image').trigger('zoom.destroy');
    $('.woocommerce-main-image').css('min-height', $('.woocommerce-main-image .attachment-shop_single').height());
    $('.woocommerce-main-image').attr('href', $(this).attr('href') );
    $('.woocommerce-main-image .attachment-shop_single').replaceWith($(this).data('swapimage'));
    $('.woocommerce-main-image').zoom({
      url: $('.woocommerce-main-image').attr('href'),
      magnify: 0.75,
      touch: false
    });
    //$('.woocommerce-main-image').css('min-height', 'auto');
    setTimeout(function() { $('.woocommerce-main-image').css('min-height', 'auto'); } , 2000);
  });

  /*** CONTACT FORM ******/
  $("#contact_form").on('submit', function(ev) {
    ev.preventDefault();
    var user_name = $('input[name=message_name]').val();
      var user_email = $('input[name=message_email]').val();
      var user_tel = $('input[name=message_tel]').val();
      var user_msg = $('textarea[name=message_text]').val();

      var proceed = true;
      if (user_name === "") {
          proceed = false;
      }
      if (user_email === "") {
          proceed = false;
      }
      if (user_msg === "") {
          proceed = false;
      }


      //everything looks good! proceed...
      if (proceed) {
          //data to be sent to server
          post_data = {
              'userName': user_name,
              'userEmail': user_email,
              'userTel': user_tel,
              'userMsg': user_msg
          };

          //Ajax post data to server
          $.post($('#contact_form').attr('action'), post_data, function(response){

              //load json data from server and output message
              if (response.type === 'error') {
                  output = '<p class="error">' + response.text + '</p>';
              }
              else {

                  output = '<p class="success">' + response.text + '</p>';

                  //reset values in all input fields
                  $('#contact_form input').val('');
                  $('#contact_form textarea').val('');
              }

              $("#result").hide().html(output).slideDown();
          }, 'json');

      }

      return false;
  });


  //reset previously set border colors and hide all message on .keyup()
  $("#contact_form input, #contact_form textarea").keyup(function(){
      $("#result").slideUp();
  });


  /*** Mailchipmp ****/

  // Validate the email address in the form
  function isValidEmail($form) {
      // If email is empty, show error message.
      // contains just one @
      var email = $form.find('input[type="email"]').val();
      if (!email || !email.length) {
          return false;
      } else if (email.indexOf('@') === -1) {
          return false;
      }
      return true;
  }

  // Submit the form with an ajax/jsonp request.
  // Based on http://stackoverflow.com/a/15120409/215821
  function submitSubscribeForm($form, $resultElement) {
      $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize(),
          cache: false,
          dataType: 'jsonp',
          jsonp: "c", // trigger MailChimp to return a JSONP response
          contentType: "application/json; charset=utf-8",
          error: function(error){
              // According to jquery docs, this is never called for cross-domain JSONP requests
          },
          success: function(data){
              if (data.result !== 'success') {
                  var message = data.msg || 'Sorry. Unable to subscribe. Please try again later.';
                  if (data.msg && data.msg.indexOf("already subscribed") >= 0) {
                      message = 'Már fel vagy iratkozva. Köszönjük.';
                  }
                  $resultElement.html(message);
              } else {
                  $resultElement.html('Köszönjük! Feliratkozásod jóvá kell hagynod. A megerősítő e-mailt kiküldtük.');
              }
          }
      });
  }

  // Turn the given MailChimp form into an ajax version of it.
  // If resultElement is given, the subscribe result is set as html to
  // that element.
  function ajaxMailChimpForm($form, $resultElement){
      // Hijack the submission. We'll submit the form manually.
      $form.submit(function(e) {
          e.preventDefault();
          if (!isValidEmail($form)) {
              var error =  'Érvényes e-mail címe szükséges';
              $resultElement.html(error);
          } else {
              $resultElement.html('Feliratkozás&hellip;');
              submitSubscribeForm($form, $resultElement);
          }
      });
  }

  ajaxMailChimpForm($('#mc-embedded-subscribe-form'), $('#mce-responses'));

  //sticky heade
  var siteheadwrap = document.getElementById('siteheadwrap');
  window.addEventListener('scroll', function(){
      var siteheadplaceholder = document.getElementById('siteheadplaceholder');
      var elTop = siteheadplaceholder.getBoundingClientRect().top;
      //console.log(document.body.getBoundingClientRect().top);
      if (document.body.getBoundingClientRect().top+elTop < 0){
          siteheadwrap.classList.add('is-fixed');
      } else {
          siteheadwrap.classList.remove('is-fixed');
      }
  });

  $('.sitetoggler a').on('click', function(e) {
     $('.topacc').foundation('up', $('#thetopcart'));
  });

  $('.sitecart a').on('click', function(e) {
    e.preventDefault();
     $('.topacc').foundation('toggle', $('#thetopcart'));
  });

  $('.filterblock--colors li a').each( function( i, val ) {
   $(this).parent().addClass($.slugi($(this).text())) ;
  });


  //Mérettablazat modal
  $('.linktosizetable').on('click', function(e) {
    e.preventDefault();
    var $modal = $('#sizemodal');
    $.ajax($(this).attr('href'))
      .done(function(resp){
        var cleanTitle = $(resp).find('.pagetitle').eq(0);
        var cleanCont = $(resp).find('.pagecontent').eq(0);
        $modal.html('<h2>Mérettáblázat</h2><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>').append(cleanCont).foundation('open');
      });

  });


  });





})(jQuery);

