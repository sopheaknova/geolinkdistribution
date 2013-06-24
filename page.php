<?php get_header(); ?>

<?php $has_sidebar = sp_check_page_layout(); ?>

<section id="content" class="clearfix <?php echo sp_check_sidebar_position(); ?>">

<div class="wrap-container"> 
    <div class="container clearfix">

		<?php if( $has_sidebar ): ?>

		<div class="main">

		<?php if (have_posts()) while ( have_posts() ): the_post(); ?>
        <div class="page-body">	
            <h1><?php echo the_title(); ?></h1>
            
			<?php the_content(); ?>
			<div class="clear"></div>
			<p><?php edit_post_link( __( 'Edit', 'sptheme' ), '', '' ); ?></p>
        </div>

		<?php endwhile; ?>

		</div>
	 	<!-- end .main -->
			
		<div class="side-right">
        <?php get_sidebar(); ?>
        </div>

        <?php else :?>

        <?php if (have_posts()) while ( have_posts() ): the_post(); ?>
             
            <?php $getTitle = get_the_title();?>
        	<h1 class="title"><?php echo ucwords(strtolower($getTitle)); ?></h1>
            <section id="about-description">
			<?php the_content(); ?>
			<div class="clear"></div>
			<p><?php edit_post_link( __( 'Edit', 'sptheme' ), '', '' ); ?></p>

            </section>
            <!-- end section -->
		<?php endwhile; ?>

		<?php endif; ?>
        
    </div>
    <!-- end class container -->
</div>
<!-- end class wrap-container -->

</section><!-- end #content -->

<?php get_footer(); ?>
