
<aside class="sidebar mgrid-full tgrid-1-3">
  <nav class="side-nav">
    <ul><?php $real_stories = get_ID_by_slug('real-stories'); ?><?php $stories_nav = array('child_of' => $real_stories,'title_li' => '','depth' => 0); ?><?php wp_list_pages($stories_nav); ?>
    </ul>
  </nav><?php while ( have_posts() ) : the_post(); ?><!-- Possible Callout --><?php if (get_field('callout_picker')) : ?><?php foreach(get_field('callout_picker') as $post): ?><?php setup_postdata($post); ?>
  <section><a href="&lt;?php the_field('link'); ?&gt;" class="module">
      <h5 class="module-title"><?php the_field('title'); ?></h5>
      <p class="module-text"><?php the_field('text'); ?></p></a></section>
</aside><?php endforeach; wp_reset_postdata(); endif; endwhile; ?>