 $(document).ready(function() {
  AOS.init();
  $screenSlides = 3.5;
  if(screen.width<=1024){
    $screenSlides = 1.3;
  }
	var recomandations = new Swiper(".recomendations", {
        slidesPerView: $screenSlides,
		    loop:true,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          dynamicBullets: true,
        },
      });
      
          $(window).scroll(function() {
      if($(window).scrollTop() > 0) {
          $(".scroll-up").css("display","block");
      } else {
          $(".scroll-up").css("display","none");
      }
  }); 

  $(".scroll-up").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });

  $('.despre').click(function(){
    var target = $('.valori-container');
      if (target.length) {
          $('html,body').animate({
              scrollTop: target.offset().top
          }, 1000);
          return false;
      };
  })
  $('.locatie').click(function(){
    var target = $('#map-canvas');
      if (target.length) {
          $('html,body').animate({
              scrollTop: target.offset().top
          }, 1000);
          return false;
      };
  })
   
   $('.arrow-down').click(function(){
    var target = $('#pasiune-si-gust');
      if (target.length) {
          $('html,body').animate({
              scrollTop: target.offset().top
          }, 1000);
          return false;
      };
  })

    
})