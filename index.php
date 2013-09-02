<?php
/**
 * The main template file.
 */

//global $pls_archive_template;
get_header(); ?>

	<?php 
		$home_select = $smof_data['home_select']; 
		$page = get_page_by_path($home_select); // get page by slug name
		$title = get_the_title($page->ID);
		$page_content = $page->post_content;
	?>
	
    <div id="main">
    	
    	<div id="welcome" class="clearfix">
	    	<div class="two-third">
		    	<div class="section-title"><h3><?php echo $title; ?></h3></div>
		    	<p><?php echo $page_content; ?></p>
		    	</div>
	    	<div class="one-third last">
		    	<center>
			    <?php echo $smof_data['owned_by_title'];?>
			    <img src="<?php echo $smof_data['goelink_group_logo'];?>" width="247" height="151" />
		    	</center>
	    	</div>
    	</div>
    	
    	<?php 
			$service_select = $smof_data['service_select']; 
			$page = get_page_by_path($service_select); // get page by slug name
		?>
    	<div id="services" class="clearfix">
    	<div class="section-title"><h3>Our Services</h3></div>
    	<?php echo sp_child_page_lists($page->ID, 'menu_order', 68, 68); ?>
    	</div>
    	
    	<div id="clients">
    	<div class="section-title"><h3>Some our past and current clients</h3></div>
    	<?php echo sp_clients_carousel(8); ?>
    	</div>
    	
		
    </div><!-- #main -->

<?php get_footer(); ?>