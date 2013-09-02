<?php

/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/

class sp_widget_testimonials extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id     = 'sp-widget-testimonials';
		$prefix = SP_THEME_NAME . ': ';
		$name   = '<span>' . $prefix . __( 'Testimonials', 'sptheme_widget' ) . '</span>';
		$widget_ops = array(
			'classname'   => 'sp-widget-testimonials',
			'description' => __( 'Display latest testimonial', 'sptheme_widget' )
			);
		$control_ops = array();

		//$this->WP_Widget( $id, $name, $widget_ops, $control_ops );
		parent::__construct( $id, $name, $widget_ops, $control_ops );
		
	} // /__construct
	
    function form( $instance )
    {
        /* Impostazioni di default del widget */
        $defaults = array( 
            'title' => ''
        );
        
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
       
       <p>
            <label>
                <strong><?php _e( 'Title', 'sptheme' ) ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>  
        <?php
    }
    
    function widget( $args, $instance )
    {
        extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		
		echo $before_widget;                   
		
		/* Title of widget (before and after define by theme). */
		if ( $title )
			echo $before_title . $title . $after_title;
			
		echo sp_last_testimonial();
        
        echo $after_widget;
    }                     

    function update( $new_instance, $old_instance ) 
    {
        $instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
        return $instance;
    }
    
}     
?>
