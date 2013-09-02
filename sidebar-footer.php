<?php
/**
 * The sidebar containing the main widget area.
 */

global $post, $smof_data;

?>


	<aside id="sidebar-footer" class="widget-footer clearfix" role="complementary">
		<div class="<?php echo $smof_data['footer_layout']; ?>">
	<?php
		if ( is_active_sidebar( 'Footer Sidebar' ) ) :
			dynamic_sidebar('Footer Sidebar');
		else:
		?>	
			<div class="non-widget widget">
		    <h3><?php _e('About Default Sidebar'); ?></h3>
		    <p class="noside"><?php _e('To edit this sidebar, go to admin backend\'s <strong><em>Appearance -&gt; Widgets</em></strong> and place widgets into the <strong><em>Default Sidebar</em></strong> Area', SP_TEXT_DOMAIN); ?></p>
		    </div>
	<?php	
		endif;
		?>	    
		</div> <!-- widget cols -->    
	</aside> <!--End #Sidebar-->	