
<div id="stickyFooterContainer" style="z-index: 100000;">
  <div role="contentinfo" class="footer bg-blue"><?php if(!is_mobile()):  ?>
    <nav class="nav-footer nav-footer-int main-nav-footer"><?php wp_nav_menu( array('theme_location' => 'Main Navigation','menu' => 'Main Navigation','container' => 'false'));  ?>
    </nav><?php endif;  ?>
  </div>
  <footer class="footer-bottom-wrap bg-blue">
    <div class="footer-bottom">
      <div class="wrap">
        <div class="grid">
          <div class="grid-full"><?php if(!is_mobile()) :  ?><a href="<?php echo home_url(); ?>/providers/" class="button for-providers<?php if(get_the_title()=='Information for Health Care Providers')echo ' on'; ?>">For Providers</a><?php endif;  ?><span class="copy">&copy; <?php the_time('Y'); ?> <a href="http://healthvermont.gov/prevent/tobacco/index.aspx" target="_blank">Vermont Department of Health</a></span><?php wp_nav_menu( array('theme_location' => 'Footer Navigation','menu' => 'Footer Navigation','container' => false,'menu_class' => 'nav-footer-secondary') ); ?>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>