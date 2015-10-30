<?php get_header();  ?>
<main role="main" class="main grid-full searchPage"><!-- Search Results for: -->
  <h1 class="page-title">Search Results</h1><!-- Reults List --><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> ?>
  <article class="results">
    <h4><a href="&lt;?php the_permalink() ?&gt;" title="&lt;?php the_title_attribute(); ?&gt;"><?php the_title(); ?></a></h4><?php the_excerpt('<span class="read-more">Read more &raquo;</span>');  ?><?php if(strlen(get_the_excerpt()) > 275 ) :  ?><a href="&lt;?php the_permalink() ?&gt;" class="button">Read More </a><?php endif  ?>
  </article>
  <hr class="search"/><!-- Previous & Next --><?php endwhile; posts_nav_link('--','Previous','Next'); ?><?php else: ?><!-- Else -->
  <article id="post-not-found">
    <h4>Sorry, no results.</h4>
    <p>Try your search again.</p>
  </article><?php endif;  ?>
</main><?php get_footer();  ?>