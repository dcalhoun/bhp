jQuery(document).ready(function($) {
  
  /*$('div.photo').hover(function(){
    $(this).find('span.label').animate({bottom:'0'},{queue:false,duration:500});
    }, function() {
    };
  });
  $('div.photo').hover(function() {
    $(this).find('span.label').animate({bottom:'0'},{queue:false,duration:500});
    }, function(){
      $(this).find('span.label').animate({bottom:'-44px'},{queue:false,duration:500});
  });*/
  
  //////////
  // Initialize Fancybox Galleries
  //////////
  $('div.fancybox a').fancybox();
  
});