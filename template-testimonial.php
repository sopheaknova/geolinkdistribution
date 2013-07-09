<?php global $smof_data; ?>
<?php
/*
Template Name: Testimonial
*/
?>
<?php get_header(); ?>
<div class="wrap-container"> 
    <div class="container clearfix">
         
        <?php $getTitle = get_the_title();?>
        <h1 class="title"><?php echo ucwords(strtolower($getTitle)); ?></h1>
        <section id="testimonial-desc">
        	<?php if (have_posts()) while ( have_posts() ): the_post(); ?>
           
			<?php the_content(); ?>
		   
			<?php endwhile; ?>
        </section>
        <section>

              <div class="main">
              <ul id="list-testimonial">

              <?php $querys = new WP_Query(array('post_type' => 'sp_testimonial')); ?>

              <?php if ( $querys->have_posts() ) : ?>
	              <?php while ( $querys->have_posts() ) : $querys->the_post(); ?>
	              <li>
	              <?php the_content();?>
	             
                  <div class="position">
                  <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
	              <?php $meta_post = get_post_meta($post->ID, 'sp_user_position', true);?>
	              <?php if(trim($meta_post)!==''){?>
	              <small><?php echo $meta_post;?></small>
                  
	              <?php }?>
	              </div>
	              </li>
	              <?php endwhile; ?>
	              <?php // Pagination
					if(function_exists('wp_pagenavi'))
						wp_pagenavi();
					else 
						echo sp_pagination(); 
				  ?>
			  </ul>
			  <?php else: ?>
			
				<article id="post-0" class="post no-results not-found">
			
					<h3><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for...', 'sptheme' ); ?></h3>

				</article><!-- end .hentry -->

			  <?php endif; ?>
              </div>
	 	      <!-- end .main -->
	 	      <div class="side-right">
              <?php get_sidebar(); ?>
              </div>
        </section>
        <!-- end section -->
    </div>
    <!-- end class container -->
</div>

<!-- end class wrap-container -->
<?php get_footer(); ?>