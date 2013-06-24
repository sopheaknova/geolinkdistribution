<?php
/*
Template Name: Services Temprary
*/
?>
<?php get_header(); ?>
<div class="wrap-container"> 
    <div class="container clearfix">
         
        <?php $getTitle = get_the_title();?>
        <h1 class="title"><?php echo ucwords(strtolower($getTitle)); ?></h1>
        <section id="services-description">
        	<?php if (have_posts()) while ( have_posts() ): the_post(); ?>

			<?php the_content(); ?>
			<?php endwhile; ?>
        </section>
        <!-- end section -->
        <section id="list-all-services">
                   
              <div class="item-service">
                <h3>Market Research</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-1.jpg"  alt="market-1" />
                <p>Igmaination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </div>
              <div class="item-service">
                <h3>Customer Research</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-2.jpg" alt="market-2" />
                <p>Igmaination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </div>
              <div class="item-service">
                <h3>Strategic Marketing</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-3.jpg" alt="market-3" />
                <p>Igmaination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </div>
              <div class="item-service">
                <h3>Strategic Marketing</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-1.jpg" alt="market-1" />
                <p>Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </div>
              <div class="item-service">
                <h3>Strategic Marketing</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-2.jpg" alt="market-2" />
                <p>Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </div>
              <div class="item-service">
                <h3>Strategic Marketing</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-3.jpg" alt="market-3" />
                <p>Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </div>

        </section>
        <!-- end section -->
    </div>
    <!-- end class container -->
</div>

<!-- end class wrap-container -->
<?php get_footer(); ?>