
<nav class="side-nav">
  <ul><?php wp_list_pages(array('title_li' => '','depth' => 1,'child_of' => get_post_top_ancestor_id()));  ?>
  </ul>
</nav>