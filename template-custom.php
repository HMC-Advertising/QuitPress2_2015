<?php /* Template Name: Custom Template */  ?><?php get_header();  ?><?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
<article role="main">
  <h3 class="page-title"><?php the_title();  ?>
  </h3><?php the_content();   ?>
</article><?php endwhile; endif;  ?><?php get_sidebar();  ?><?php get_footer();  ?>