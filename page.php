<?php get_header();  ?><?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
<div class="container mainContent">
  <div>
    <main role="main" class="main col-lg-9">
      <div class="main-indent">
        <h1 class="page-title"><?php if($post->post_parent):  ?><a href="<?php echo get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent) ?><br/></a><?php echo get_the_title();  ?><?php else: ?><?php the_title();  ?><?php endif;   ?>
        </h1><?php the_content();  ?>
      </div>
    </main>
  </div><?php get_sidebar();  ?>
</div><?php endwhile; endif;  ?><?php get_footer();  ?>