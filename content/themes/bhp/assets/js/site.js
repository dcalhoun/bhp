jQuery(document).ready(function($) {

  // Highlight "photos" navigation item when on a gallery page
  if ( $('body').hasClass('post-type-archive-gallery') || $('body').hasClass('tax-style') || $('body').hasClass('single-gallery') ) {
    var current_page = $('nav#primary-navigation ul li.current_page_parent');
    var gallery_page = $('nav#primary-navigation ul li a[href="/gallery"]');
    $(current_page).removeClass('current_page_parent');
    $(gallery_page).parent('li').addClass('current_page_parent');
  }
  
  // Slide gallery titles in on hover - IE only
  /*$('div.photo').hover(function() {
    $(this).find('span.label').animate({bottom:'0'},{queue:false,duration:400});
    }, function(){
      $(this).find('span.label').animate({bottom:'-44px'},{queue:false,duration:400});
  });*/
  
});