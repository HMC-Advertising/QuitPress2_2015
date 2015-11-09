<?php get_header();  ?><?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ta-center welcome-text">
    <h2>See Real Stories From Around <span class="hidden-lg hidden-xs hidden-sm hidden-xxs"<br></span> the 802</h2><?php if(is_ipad() or is_tablet()):   ?>
    <div class="chooseFromContainer M">
      <div class="chooseFrom M">
        <div class="right-triangle white"></div>
        <div id="chooseFromText" class="chooseFromText M"><strong>Read stories from Vermonters like you</strong></div>
      </div>
      <div class="right-triangle blue"></div>
    </div><?php elseif(!is_mobile() ):   ?>
    <div class="chooseFromContainer">
      <div class="chooseFrom">
        <div class="right-triangle white"></div>
        <div id="chooseFromText" class="chooseFromText"><strong>Read stories from Vermonters like you</strong></div>
      </div>
      <div class="right-triangle blue"></div>
    </div><?php endif;  ?>
    <h3 class="<?php if(is_ipad() or is_tablet()){echo 'M';} ?>">And get tips and tools that can help make it easier if you decide to quit smoking.</h3><?php if(is_mobile() ): //or is_ipad() or is_tablet()  ?>
    <div class="mobileArrow"><strong>Choose from the reasons Vermonters are talking about the most</strong></div><?php endif;  ?>
  </div>
  <div class="parent col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php get_template_part('assets/php/templates/stories', 'nav');  ?>
  </div>
</div><?php endwhile; endif;  ?><?php get_footer();  ?>