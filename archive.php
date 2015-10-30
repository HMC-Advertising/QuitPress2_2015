<?php get_header();  ?>
<section role="main" class="archive-results">
  <h3><?php single_cat_title(); ?></h3><?php if (have_posts()) : while (have_posts()) : the_post();  ?>
  <article class="results">
    <h4><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4><small>Posted &nbsp;
      <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate="pubdate"><?php the_time('F jS, Y'); ?></time></small><?php the_excerpt();  ?><a href="<?php the_permalink(); ?>" class="button">Read More</a>
  </article><?php endwhile; posts_nav_link('--','Previous','Next'); endif; ?>
</section><?php get_sidebar(); ?><?php get_footer(); ?>