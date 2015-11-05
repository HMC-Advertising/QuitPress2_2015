<?php /* Template Name: Stories Template */  ?><?php get_header();  ?><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?><?php get_template_part('assets/php/templates', 'stories-nav');   ?>
<main class="main">
  <div class="grid">
    <header class="grid-full stories-header"><?php $hl; // this is for the copy issues. Instead dealing with the buttons and the like, this just lookes up the title name then output for it.  ?><?php if(get_the_title() ==  "Wellness" ): ?><?php $hl ='Real tips, tools, and stories to help when <strong>Quitting for your Wellness</strong>'; ?><?php else if(get_the_title() ==  "Illness" ):  ?><?php $hl ='Real tips, tools, and stories to help when <strong>Quitting for your Illness</strong>'; ?><?php else if(get_the_title() ==   "Baby"): ?><?php $hl ='Real tips, tools, and stories to help when <strong>Quitting for your Baby</strong>'; ?><?php else if(get_the_title() ==   "Family"): ?><?php $hl ='Real tips, tools, and stories to help when <strong>Quitting for your Family</strong>'; ?><?php else if(get_the_title() ==   "Loss"): ?><?php $hl ='Real tips, tools, and stories to help when <strong>Quitting for your Lost Loved One</strong>'; ?><?php else: ?><?php $hl ='Real tips, tools, and stories to help when <strong>Quitting to save Money</strong>'; ?><?php endif; ?>
    </header>
    <h1 class="page-title"><?php echo $hl;  ?><?php $stories_intro = get_field('stories_intro');  ?><?php if($stories_intro) :  ?><?php if(get_the_title() == "Baby"): ?><?php $linkBaby = ' <a href="http://802quits.org/quit-help-by-phone/baby/">Learn how you can get FREE personal help quitting for you and your baby.</a>';  ?><?php $s = $stories_intro . $linkBaby;  ?><?php else if(get_the_title() == "Money"):   ?><?php $l = ' <a href="http://802quits.org/calculator/">Add up how much money you’ll save by not smoking for 6 months, a year, or more ...</a>';  ?><?php $s = $stories_intro . $l;  ?><?php else:  ?><?php $s =$stories_intro;  ?><?php endif;  ?><?php _e('<div class="stories-intro"><p>'.$s.' </p></div>');  ?><?php endif;  ?>
    </h1>
  </div>
  <div class="grid"></div><?php $quotes = get_field('quote_picker');  ?><?php if($quotes):  ?>
  <div class="tgrid-2-3 mb0">
    <div class="main-indent">
      <div class="stories-quotes"><?php foreach($quotes as $post): ?><?php setup_postdata($post);  ?><?php $quote = get_field('quote'); ?> ?><?php $content = get_the_content(); ?> ?><?php if((strpos($quote, '<iframe') !== FALSE) or strpos($content, '<iframe') !== FALSE): ?> ?><?php if($quote): ?>
        <blockquote class="stories-quote q">
          <p>!= <?php the_field('quote'); ?></p>
          <div style="float:left" class="left"><span class="stories-quote-cite"><strong>!= <?php the_field('name'); ?></strong><?php the_field('location');  ?></span></div>
          <div style="float:right" class="right"><a href="<?php the_permalink(); ?>" class="button">Read More</a></div>
        </blockquote><?php else:  ?>
        <blockquote class="stories-quote f">
          <p><?php echo  $content; ?></p><span class="stories-quote-cite"><strong><?php the_field('name'); ?></strong><?php the_field('location'); ?></span>
        </blockquote><?php endif; ?><?php else:  ?><?php if($quote):  ?>
        <blockquote class="stories-quote q">
          <p>!= <?php the_field('quote'); ?></p>
          <div style="float:left" class="left"><span class="stories-quote-cite"><strong>!=<?php the_field('name'); ?></strong><?php the_field('location');  ?></span></div>
          <div style="float:right" class="right"><a href="<?php the_permalink(); ?>" class="button">Read More</a></div>
        </blockquote><?php else:  			 ?>
        <blockquote>class="stories-quote f">
          <p>!= "<?php echo  $content; ?>"</p><span class="stories-quote-cite"><strong>!= <?php the_field('name'); ?></strong><?php the_field('location'); ?></span>
        </blockquote><?php endif;   ?><?php endif;   ?><?php wp_reset_postdata();  ?>
      </div><?php endforeach;  ?><a href="<?php $title_lower = strtolower(get_the_title()); echo home_url().'/real-stories/'.$title_lower; ?>" class="button-large">Read More Stories</a>
    </div><?php endif;  ?><?php $tips = get_field('tips_and_tools');  ?><?php if($tips):  ?>
    <aside class="tgrid-1-3 stories-tips">
      <h2 class="stories-tips-header">Tips &amp; Tools</h2><?php foreach($tips as $post):  ?><?php setup_postdata($post);  ?><?php endforeach; ?>
      <div class="stories-tip"><?php the_content();  ?>
      </div><?php wp_reset_postdata();   ?>
    </aside><?php endforeach;  ?><a href="<?php echo home_url();?>/resources/tips-and-tools/" class="button-large">Get More Tips &amp; Tools</a>
  </div><?php endif; ?> ?>
</main><?php endwhile; endif; get_footer();  ?>