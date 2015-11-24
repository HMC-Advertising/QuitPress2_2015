<?php get_header();  ?>
<main class="col-lg-12">
  <h1 class="page-title"> <?php post_type_archive_title();  ?><strong>from around the 802</strong>
  </h1>
  <div class="stories-quotes"><?php if (have_posts()) : while (have_posts()) : the_post();  ?>
    <blockquote class="stories-quote aq">
      <p>"<?php the_field('quote'); ?>"</p>
      <div class="left"><span class="stories-quote-cite"><strong> <?php the_field('name'); ?></strong><?php the_field('location');  ?></span></div>
    </blockquote><?php endwhile; posts_nav_link('--','Previous','Next'); endif;  ?>
  </div>
</main><?php get_footer();  ?>