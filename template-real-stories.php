<?php /* Template Name: Real Stories Archive Template */  ?><?php get_header();  ?><?php $title_lower = strtolower(get_the_title());  ?><?php $the_query = array( 'category_name' => $title_lower, 'post_type' => 'stories', 'posts_per_page' => 30 );  ?><?php $stories_query = new WP_Query( $the_query );  ?><?php if ( $stories_query->have_posts() ) :  ?>
<div class="container mainContent">
  <main role="main" class="main col-md-9">
    <div class="main-indent">
      <h1 class="page-title">Real Stories - <?php the_title(); ?></h1><?php the_content();   ?><?php while ( $stories_query->have_posts() ) : $stories_query->the_post();   ?>
      <blockquote class="stories-quote"><?php $quote = get_field('quote');  if($quote) :  ?>
        <p><?php echo '"'.$quote.'"';  ?>
        </p><?php else:  ?><?php the_content();  ?><?php endif;  ?><?php $name = get_field('name');  ?><?php $location = get_field('location');  ?><?php if($location || $name) :  ?><span class="stories-quote-cite"><?php if($name):  ?><strong><?php echo $name; ?> </strong><?php endif;  ?><?php echo $location;  ?></span><?php endif;  ?><?php if($quote) :  ?><a href="<?php the_permalink(); ?>" class="button">Read More</a><?php endif;  ?>
      </blockquote><?php endwhile;   ?>
    </div>
  </main><?php get_sidebar('stories-archive');  ?>
</div><?php endif; wp_reset_postdata();  get_footer();   ?>