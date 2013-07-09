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

              <?php 
                    $get_page = $smof_data['page_product'];
                    $page = get_page_by_title($get_page);

                    $get_num = $smof_data['num-sub-product'];
                    $get_num = trim($get_num) == ''? '3' : $get_num;
              ?>
             
              <?php query_posts(array('showposts' => $get_num, 'post_parent' => $page->ID, 'post_type' => 'page')); 
              while (have_posts()) { the_post(); ?>

              <div class="item-service">
              <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
              <?php if(has_post_thumbnail()){
              the_post_thumbnail('service-post');
              }?>
              <?php echo sp_excerpt_length(10);?>
              </div>

              <?php } ?>

        </section>
        <!-- end section -->
    </div>
    <!-- end class container -->
</div>

<!-- end class wrap-container -->
<?php get_footer(); ?>