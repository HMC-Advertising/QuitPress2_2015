<?php get_header();  ?><?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ta-center welcome-text">
    <h2>Real Stories From Around <span class="hidden-lg hidden-md hidden-xs hidden-sm hidden-xxs"><br></span> the 802</h2><?php if(is_ipad() or is_tablet()):   ?>
    <div class="chooseFromContainer M">
      <div class="chooseFrom M">
        <div class="right-triangle white"></div>
        <div id="chooseFromText" class="chooseFromText M"><strong> <span style="text-align:center">Select a reason to quit to get started.</span></strong></div>
      </div>
      <div class="right-triangle blue"></div>
    </div><?php elseif(!is_mobile() ):   ?>
    <div class="chooseFromContainer">
      <div class="chooseFrom">
        <div class="right-triangle white"></div>
        <div id="chooseFromText" class="chooseFromText"><strong> <span style="text-align:center">Select a reason to quit to get started.</span></strong></div>
      </div>
      <div class="right-triangle blue"></div>
    </div><?php endif;  ?>
    <h3 class="<?php if(is_ipad() or is_tablet()){echo 'M';} ?>"><strong> You're not alone. </strong> Vermonters share their stories, tips and tools with you. Their experiences can help you quit. </h3><?php if(is_mobile() ): //or is_ipad() or is_tablet()  ?>
    <div class="mobileArrow"><strong>Select a reason to quit <br> to get started.  </strong></div><?php endif;  ?>
  </div>
  <div class="parent col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php get_template_part('assets/php/templates/stories', 'nav');  ?>
  </div>
</div><?php endwhile; endif;  ?><?php get_footer();  ?>