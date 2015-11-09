
<aside class="sidebar col-xs-12 col-md-3 col-lg-3">
  <nav class="side-nav">
    <ul><?php $real_stories = get_ID_by_slug('real-stories');  ?><?php $stories_nav = array('child_of' => $real_stories,'title_li' => '','depth' => 0);  ?><?php wp_list_pages($stories_nav);  ?>
    </ul><?php while ( have_posts() ) : the_post();  ?><?php if (get_field('callout_picker')) :  ?><?php foreach(get_field('callout_picker') as $post):  ?><?php setup_postdata($post);  ?>
    <section><a href="<?php the_field('link'); ?>" class="module">
        <h5 class="module-title"><?php the_field('title');  ?>
        </h5>
        <p class="module-text"><?php the_field('text');  ?>
        </p></a></section><?php endforeach; wp_reset_postdata();  ?><?php endif;  ?><?php endwhile;  ?>
  </nav>
</aside>