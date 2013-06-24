<?php
/*
Template Name: Product temprary
*/
?>
<?php get_header(); ?>
<div class="wrap-container"> 
    <div class="container clearfix">
         
        <?php $getTitle = get_the_title();?>
        <h1 class="title"><?php echo ucwords(strtolower($getTitle)); ?></h1>
        <section id="product-description">
        	<?php if (have_posts()) while ( have_posts() ): the_post(); ?>

			<?php the_content(); ?>
			<?php endwhile; ?>
        </section>
        <!-- end section -->
        <section id="list-all-services">
                   
              <div class="item-service">
                <h3>Product One</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-1.jpg"  alt="market-1" />
                
              </div>
              <div class="item-service">
                <h3>Product Two</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-2.jpg" alt="market-2" />
                
              </div>
              <div class="item-service">
                <h3>Product Three</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-3.jpg" alt="market-3" />
                
              </div>
              <div class="item-service">
                <h3>Product Four</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-1.jpg" alt="market-1" />
                
              </div>
              <div class="item-service">
                <h3>Prodcut Five</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-2.jpg" alt="market-2" />
                
              </div>
              <div class="item-service">
                <h3>Product Six</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-3.jpg" alt="market-3" />
                
              </div>

        </section>
        <!-- end section -->
    </div>
    <!-- end class container -->
</div>

<!-- end class wrap-container -->
<?php get_footer(); ?>