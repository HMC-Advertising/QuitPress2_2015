
<aside class="sidebar col-lg-3 col-md-2 col-sm-12 col-xs-12 <?php if(is_page('providers') ) echo 'pro-sidebar'; ?>"><?php if(is_page("providers") or is_page("providers/webinars-2/") or is_page("providers/provider-resources/") or is_page("providers/resources-patient/") or is_page("providers/helpful-links/") or is_page("cpt-code-information/") or is_page("providers/videos/")  ): ?><?php get_template_part("assets/php/templates/sidebar", "provider");  ?><?php else: ?><?php get_template_part("assets/php/templates/sidebar", "page");  ?><?php endif;  ?><?php if (get_field('callout_picker')) : foreach(get_field('callout_picker') as $post): setup_postdata($post);  ?>
  <section><a href="<?php the_field('link'); ?>" class="module">
      <h5 class="module-title"><?php the_field('title');  ?>
      </h5>
      <p class="module-text"><?php the_field('text');  ?>
      </p></a></section><?php endforeach; wp_reset_postdata(); endif; ?>
</aside>