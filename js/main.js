// Hello.
//
// This is The Scripts used for ___________ Theme
//
//

function main() {

(function () {
   'use strict';

   /* ==============================================
  	Testimonial Slider
  	=============================================== */ 

  	$('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 40
            }, 900);
            return false;
          }
        }
      });

    /*====================================
    Show Menu on Book
    ======================================*/
    $(window).bind('scroll', function() {
        var navHeight = $(window).height() - 100;
        if ($(window).scrollTop() > navHeight) {
            $('.navbar-default').addClass('on');
        } else {
            $('.navbar-default').removeClass('on');
        }
    });

    $('body').scrollspy({ 
        target: '.navbar-default',
        offset: 80
    })

  	$(document).ready(function() {

  	  $("#clients").owlCarousel({
  	 
  	      navigation : false, // Show next and prev buttons
  	      slideSpeed : 300,
  	      paginationSpeed : 400,
  	      autoHeight : true,
  	      itemsCustom : [
				        [0, 1],
				        [450, 2],
				        [600, 2],
				        [700, 2],
				        [1000, 3],
				        [1200, 3],
				        [1400, 3],
				        [1600, 3]
				      ],
  	  });

      $("#testimonial").owlCarousel({
        navigation : false, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true
        });

  	});

  	/*====================================
    Portfolio Isotope Filter
    ======================================*/
    $(window).load(function() {
        var $container = $('#lightbox');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        $('.cat a').click(function() {
            $('.cat .active').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });

    });
	
	var form = $('#contactform');
	var submit = $('#contactForm_submit');	
	var alertx = $('.form-respond'); 
	$(document).on('submit', '#contactform', function(e) {
		e.preventDefault(); // prevent default form submit
		submit.html('Sending....'); // change submit button text
		// sending ajax request through jQuery
		$.ajax({
			url: 'mail.php',
			type: 'POST', 
			dataType: 'html',
			data: $('#contactform').serialize(), 
			beforeSend: function() {
				alertx.fadeOut();
				submit.html('Sending....'); // change submit button text
			},
			success: function(data) {
				$('#contactform').fadeOut(300);
				alertx.html(data).fadeIn(1000); // fade in response data     
				setTimeout(function() {
				  alertx.html(data).fadeOut(300);
				  $('#sujet, #email, #message').val('')
				  $('#contactform').fadeIn(1800);
				  submit.html('Envoyer'); // change submit button text
			   }, 4000 );  

			},
			error: function(e) {
				console.log(e)
			}
		});
	});



}());


}
main();