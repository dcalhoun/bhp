  <div class="grid_1">&nbsp;</div>
  <footer role="site" class="grid_11">
    <p><a href="<?php bloginfo('url'); ?>/wp-admin" class="admin">&copy;</a> Copyright <?php echo date('Y'); ?> <?php bloginfo('site_title'); ?> &bull; Birmingham, AL Photography &bull; Site by <a href="http://davidcalhoun.me" title="David Calhoun" target="_blank">David Calhoun</a></p>
  </footer>

</div> <!-- #wrapper -->

<!-- ### Scripts ### -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/site.js" type="text/javascript"></script>
<?php if ( is_tax('style') || 'gallery' == get_post_type() ) { ?>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.easing-1.3.pack.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.mousewheel-3.0.4.pack.js" type="text/javascript"></script>
<script>
  jQuery(document).ready(function($){
    $('div.fancybox a').fancybox();
  });
</script>
<?php } ?>
<?php if ( is_front_page() ) { ?>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.cycle.min.js" type="text/javascript"></script>
<script>
  jQuery(document).ready(function($){
    $('#slider ul')/*.after('<a href="#" class="slider-arrow prev">Prev</a><a href="#" class="slider-arrow next">Next</a>')*/.after('<nav id="slider-nav">').cycle({
      next: '.next',
      pager: '#slider-nav',
      pause: true,
      pauseOnPagerHover: true,
      prev: '.prev',
      timeout: 6000,
    });
  });
</script>
<?php } ?>
<?php wp_footer(); ?>

</body>
</html>
