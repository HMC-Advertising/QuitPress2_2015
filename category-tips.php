<?php get_header();   ?>
<div class="row">
  <main role="main" class="main col-sm-12 archive-tips">
    <h1 class="page-title"><?php single_cat_title(); ?>
    </h1><?php if (have_posts()) : while (have_posts()) : the_post();  ?>
    <article class="stories-tip">
      <h3><?php the_title();  ?>
      </h3><?php the_content(); ?> ?>
    </article><?php endwhile; posts_nav_link('--','Previous','Next'); endif; ?>
  </main>
</div><?php get_footer();  ?>