
<footer class="footer-bottom-wrap bg-blue">
  <div class="footer-bottom">
    <div class="row">
      <div class="container">
        <div class="col-lg-12"><?php if(!is_mobile()) :  ?><a href="<?php echo home_url(); ?>/providers/" class="button for-providers<?php if(get_the_title()=='Information for Health Care Providers')echo ' on'; ?>">For Providers</a><?php endif;  ?><span class="copy">&copy; <?php the_time('Y'); ?> <a href="http://healthvermont.gov/prevent/tobacco/index.aspx" target="_blank">Vermont Department of Health</a></span><?php wp_nav_menu( array('theme_location' => 'Footer Navigation','menu' => 'Footer Navigation','container' => false,'menu_class' => 'nav-footer-secondary') ); ?>
        </div>
      </div>
    </div>
  </div>
</footer>