
<aside class="sidebar mgrid-full tgrid-1-3"><!-- Sidebar Navigation --><?php if(is_page("providers") or is_page("providers/webinars-2/") or is_page("providers/provider-resources/") or is_page("providers/resources-patient/") or is_page("providers/helpful-links/") or is_page("cpt-code-information/") or is_page("providers/videos/")  ): ?><?php get_template_part("assets/php/template", "sidebar-providers"); ?><?php else:  ?><?php get_template_part("assets/php/template", "sidebar-page"); ?><?php endif;  ?><!-- Possible Callout --><?php if (get_field('callout_picker')) : ?><?php foreach(get_field('callout_picker') as $post): ?><?php setup_postdata($post); ?>
  <section><a href="&lt;?php the_field('link'); ?&gt;" class="module">
      <h5 class="module-title"><?php the_field('title'); ?></h5>
      <p class="module-text"><?php the_field('text'); ?></p></a></section><?php endforeach; wp_reset_postdata(); endif; ?>
</aside>