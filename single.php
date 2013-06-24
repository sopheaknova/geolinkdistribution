<?php get_header(); ?>


<div class="wrap-container"> 
    <div class="container clearfix">
        <?php if(is_single()) { ?>
		<h1 class="title"><?php the_title(); ?></h1>
        <?php }else{
        	the_title();
        } ?>
	 	
		<?php if ( have_posts() ) : ?>

        <section id="single-description">
			<?php while ( have_posts() ) : the_post(); ?>

                <?php the_content();?>

			<?php endwhile; ?>
		</section>
        <!-- end section -->
		<?php endif; ?>

    </div>
    <!-- end class container -->
</div>
<!-- end class wrap-container -->	 	
       
 

<?php get_footer(); ?>
