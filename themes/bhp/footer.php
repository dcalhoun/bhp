  <div class="grid_1">&nbsp;</div>
  <footer role="site" class="grid_11">
    <p>&copy; Copyright <?php echo date('Y'); ?>. <?php bloginfo('site_title'); ?>. All Rights Reserved. Site by <a href="http://davidcalhoundesign.com" title="David Calhoun Design">David Calhoun</a>.</p>
  </footer>
  
</div> <!-- #wrapper -->

<!-- ### Scripts ### -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/site.js" type="text/javascript"></script>
<?php if ( true ) { ?>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.easing-1.3.pack.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.mousewheel-3.0.4.pack.js" type="text/javascript"></script>
<?php } ?>
<?php if ( is_front_page() ) { ?>
<script src="<?php bloginfo('template_directory') ?>/assets/js/jquery.cycle.lite.min.js" type="text/javascript"></script>
<?php } ?>
<?php wp_footer(); ?>

</body>
</html>