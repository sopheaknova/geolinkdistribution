<?php global $smof_data; ?>
<?php
/*
Template Name: Product
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

			<div class="service-highlight">
            <?php
            	global $smof_data;
            	$page_selected = $smof_data['page_product'];
            	$page_id = get_page_by_title($page_selected);
            	//echo 'page id: ' . $page_id;
            	$pages = get_pages(array('child_of' => $page_id->ID, 'sort_column' => 'menu_order'));
            	$count = 0;
            	
            	foreach ($pages as $page):
            		
            		$count++;
            		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), 'thumbnail'); 
                	$image = aq_resize($thumb[0], 86, 86, true);               	
            ?>
              <!-- Content Box #1 -->
              <div class="one_third <?php echo ($count %3 == 0) ? 'last' : ''; ?>">
              <div class="main-boxes">
                <h4><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h4>
                <div class="img-box">
                <a href="#">
                <img src="<?php echo $image; ?>" alt="<?php echo $page->post_title; ?>"/>
                </a>
                </div>
                <p><?php echo sp_excerpt_length_page(25); ?></p>
                <a href="<?php echo get_page_link( $page->ID ); ?>" class="button"><?php echo $page->post_title; ?></a>
              </div>  
              </div><!-- end .one_third -->
            <?php endforeach; ?>  
            </div><!-- end .service-highlight -->	

        </section>
        <!-- end section -->
    </div>
    <!-- end class container -->
</div>

<!-- end class wrap-container -->
<?php get_footer(); ?>