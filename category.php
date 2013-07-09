<?php get_header(); ?>

<?php $has_sidebar = sp_check_page_layout(); ?>

<section id="content" class="<?php echo sp_check_sidebar_position(); ?>">

<div class="wrap-container"> 
	<div class="container clearfix">
       
        <div class="cat-content">
        	        
 	   	<h1 class="title"><?php single_cat_title();?></h1>

 	   	<?php if(category_description()){?>

 	   	<p><?php echo category_description();?></p>
 	   	<?php }?>

	 	</div>
	 	<div class="main">
	 	<div class="item-post">
	 		<ul>
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					    <?php get_template_part( 'content', get_post_format() ); ?>


				<?php endwhile; ?>

				<?php // Pagination
					if(function_exists('wp_pagenavi'))
						wp_pagenavi();
					else 
						echo sp_pagination(); 
				?>
				
			<?php else: ?>
			
				<article id="post-0" class="post no-results not-found">
			
					<h3><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for...', 'sptheme' ); ?></h3>

				</article><!-- end .hentry -->

			<?php endif; ?>
		    </ul>
        </div>
        <!-- end .item-post -->
        </div>
	 	<!-- end .main -->
	 	<div class="side-right">
        <?php get_sidebar(); ?>
        </div>
	</div>
    <!-- end .container -->
</div><!-- end .wrap-container -->    

</section><!-- end #content -->

<?php get_footer(); ?>
