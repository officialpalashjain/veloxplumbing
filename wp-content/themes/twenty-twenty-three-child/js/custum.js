/*$(document).ready(function() {
	var s = $(".fixed_sec");
	var pos = s.position();	


	var windowpos = $(window).scrollTop();
		if (windowpos >= pos.top & windowpos >= 5) {
			s.addClass("stick");
		} else {
			s.removeClass("stick");	
		}	
	$(window).scroll(function() {
		var windowpos = $(window).scrollTop();
		if (windowpos >= pos.top & windowpos >= 5) {
			s.addClass("stick");
		} else {
			s.removeClass("stick");	
		}
	});
}); */
	

$('.home_banner_slider').slick({
  dots: false,
  arrows: false,
  infinite: false,
  autoplay: true,
  fade: false,
  speed: 1000,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});



$('.our_work_slider_sec').slick({
  dots: false,
  arrows: false,
  infinite: true,
  autoplay: true,
  speed: 100,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


$('.testimonials_slider_sec').slick({
  dots: false,
  arrows: false,
  infinite: true,
  autoplay: true,
  speed: 100,
  slidesToShow: 2,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});