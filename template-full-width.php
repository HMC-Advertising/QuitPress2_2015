<?php /* Template Name: Full Width Template */ ?><?php get_header(); ?><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="row">
  <main role="main" class="main col-sm-12">
    <h1 class="page-title"><?php the_title(); ?></h1><?php the_content();  ?>
  </main><?php endwhile; endif; ?><?php get_footer(); ?>
</div>