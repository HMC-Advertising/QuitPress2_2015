<?php get_header();  ?>
<main role="main" class="main col-lg-12 searchPage"><!-- Search Results for: -->
  <h1 class="page-title">Search Results</h1><!-- Reults List --><?php if ( have_posts() ) :  ?><?php while ( have_posts() ) : the_post();  ?>
  <article class="results">
    <h4><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title();  ?></a></h4><?php the_excerpt('<span class="read-more">Read more &raquo;</span>');   ?><?php if(strlen(get_the_excerpt()) > 275 ) :  ?><a href="<?php the_permalink() ?>" class="button">Read More </a><?php endif; ?>
  </article>
  <hr class="search"/><?php endwhile; posts_nav_link('--','Previous','Next'); ?><?php else:  ?>
  <article id="post-not-found">
    <h4>Sorry, no results.</h4>
    <p>Try your search again.</p>
  </article><?php endif;   ?>
</main><?php get_footer();  ?> ?>