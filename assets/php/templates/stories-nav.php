<?php $real_stories = get_ID_by_slug('real-stories'); ?><?php $icon_list = new page_list_with_icons(); ?><?php $mobile_Icons = new page_list_with_icons_Mobile(); ?><?php if(is_mobile()): ?>
<div class="col-lg-12 <?php if(!is_front_page()){echo 'templateSliderMobile'; } ?>"><i style="position: absolute;top: 50%; margin-top:-50px;left: 14px;font-size: 81px; color:#0DBDEE; z-index:100000000" class="fa fa-caret-left"></i>
  <div id="slider" class="nav-reasons swipe">
    <div class="grid<?php if(is_front_page() or is_page('abtesting')) echo ' parent';  ?> swipe-wrap"><?php $stories_nav = array('post_type' => 'page', 'meta_key' => '_wp_page_template','meta_value' => 'page-story.php','title_li' => '','link_before' => '<span class="nav-reasons-title">','link_after' => '</span>','walker' => $mobile_Icons,'depth' => 0); ?><?php wp_list_pages($stories_nav); ?>
    </div>
  </div><i style="position: absolute; top: 50%; margin-top:-50px; right: 14px; font-size: 81px; color:#0DBDEE; z-index:100000000" class="fa fa-caret-right"></i>
</div><?php else : ?>
<nav class="nav-reasons"> 
  <ul class="grid<?php if(is_front_page() or is_page('abtesting')) echo ' parent';  ?>"><?php $stories_nav = array('post_type' => 'page', 'meta_key' => '_wp_page_template','meta_value'=> 'page-story.php','title_li' => '','link_before' => '<span class="nav-reasons-title">', 'link_after' => '</span>', 'walker' => $icon_list, 'depth' => 0); ?><?php wp_list_pages($stories_nav);  ?>
  </ul>
</nav><?php endif;  ?>