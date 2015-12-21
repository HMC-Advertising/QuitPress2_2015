
<div role="contentinfo" in="in" data-in-mobile-after="#header" data-in-tablet-after="#main-container" data-in-standard-after="#main-container" class="row footer bg-blue frontpage <?php if(is_page('abtesting')) _e('abtesting'); ?>">
  <div class="container">
    <header class="footer-header">
      <h4 class="ta-center col-lg-12">Free help so you can quit smoking. Start today. </h4>
    </header>
    <nav class="nav-footer">
      <div class="col-lg-12"><?php wp_nav_menu( array( 'theme_location' => 'Main Navigation', 'menu' => 'Main Navigation','container' => 'false','walker'=> new menu_with_description)); ?>
      </div>
    </nav>
  </div>
</div>