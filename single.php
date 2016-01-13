<?php get_header();  if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
<div class="row">
  <main role="main" class="main col-md-12">
    <div class="container">
      <h1 class="page-title"> <?php the_title();  ?>
      </h1><?php the_content();  ?>
    </div>
  </main>
</div><?php endwhile; endif;  get_footer(); ?>