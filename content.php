<?php if(has_post_thumbnail()){ ?>
<div class="item-image">
	 <?php // the_post_thumbnail('standart-post');?>
</div>
<?php }?>

	<li class="clearfix">
        
		<span class="post-info">
		<?php echo get_the_date('F d');?>
		<hr >
		<?php echo get_the_date('Y');?>
		</span>

		<span class="post-desc">
		<?php if(is_single()) { ?>
        <h3 class="title-post"><?php the_title(); ?></h3>
        <?php } else {?>
        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
        <h3 class="title-post"><?php the_title(); ?></h3>
        </a>
        <?php } ?>

		<?php  echo sp_excerpt_length(30); //echo sp_post_content();?>
		</span>
	</li>
	    
