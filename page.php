<?php get_header();  ?><?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
<div class="grid">
  <main role="main" class="main tgrid-2-3">
    <div class="main-indent">
      <h1 class="page-title"><?php if($post->post_parent): ?><a href="<?php get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent);  ?><br/><?php echo get_the_title();  ?></a><?php else: ?><?php the_title();  ?><?php endif;   ?>
      </h1><?php the_content();  ?>
    </div>
  </main><?php get_sidebar();  ?>
</div><?php endwhile; endif;  ?><?php get_footer();  ?>