<?php $real_stories = get_ID_by_slug('real-stories'); ?><?php $icon_list = new page_list_with_icons(); ?><?php $mobile_Icons = new page_list_with_icons_Mobile(); ?><?php if(is_mobile()): ?>
<div id="slider" class="nav-reasons swipe">
  <div class="grid<?php if(is_front_page()) { echo ' parent'; } ?> swipe-wrap"><?php $stories_nav = array('post_type' => 'page', 'meta_key' => '_wp_page_template','meta_value' => 'page-story.php','title_li' => '','link_before' => '<span class="nav-reasons-title">','link_after' => '</span>','walker' => $mobile_Icons,'depth' => 0); ?><?php wp_list_pages($stories_nav); ?>
  </div>
</div><?php else : ?>
<nav class="nav-reasons">
  <ul class="grid<?php if(is_front_page()) { echo ' parent'; } ?>"><?php $stories_nav = array('post_type' => 'page', 'meta_key' => '_wp_page_template','meta_value'=> 'page-story.php','title_li' => '','link_before' => '<span class="nav-reasons-title">', 'link_after' => '</span>', 'walker' => $icon_list, 'depth' => 0); ?><?php wp_list_pages($stories_nav); ?>
  </ul>
</nav><?php endif; ?>