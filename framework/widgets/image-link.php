<?php

/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/

class sp_image_link_widget extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id     = 'sp-image-link';
		$prefix = THEME_NAME . ': ';
		$name   = '<span>' . $prefix . __( 'Image Link', 'sptheme_widget' ) . '</span>';
		$widget_ops = array(
			'classname'   => 'sp-image-link',
			'description' => __( 'Arbitrary link with a simple image', 'sptheme_widget' )
			);
		$control_ops = array();

		//$this->WP_Widget( $id, $name, $widget_ops, $control_ops );
		parent::__construct( $id, $name, $widget_ops, $control_ops );
		
		wp_enqueue_style( 'thickbox' );
        wp_enqueue_script( 'thickbox' );
        wp_enqueue_script( 'media-upload' );
        add_action( 'admin_print_footer_scripts', array( &$this, 'add_script_textimage' ), 999 );
		
	} // /__construct
	
    
    function add_script_textimage()
    {
        ?>   
        <script type="text/javascript">                 

            jQuery(document).ready(function($){
                             
                 $('.upload-image').live('click', function(){
                    var geo_link_distriute = $(this).prev();
                    
                    tb_show('', 'media-upload.php?post_id=0&type=image&TB_iframe=true');    
                
                    window.send_to_editor = function(html) {
                        imgurl = $('img', html).attr('src');
                        geo_link_distriute.val(imgurl);
                        
                        tb_remove();
                    }          
                    
                    return false;
                });
                
  
            });  
        </script> 
        <?php
    }
    
    function form( $instance )
    {
        global $icons_name;
        
        /* Impostazioni di default del widget */
        $defaults = array( 
            'title' => '',
            'image' => '',
			'link'	=> '',
			'txt'	=> ''
        );
        
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>                 
        
         <p>
            <label>
                <strong><?php _e( 'Title', 'sptheme_widget' ) ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
            </label>
        </p> 

        <p>
            <label><?php _e( 'Image', 'sptheme_widget' ) ?>:
                <input type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" />
                <a href="media-upload.php?type=image&TB_iframe=true" class="upload-image button-secondary">Upload</a>
            </label>
        </p>
        
        <p>
            <label>
                <strong><?php _e( 'Link', 'sptheme_widget' ) ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" />
            </label>
        </p>
        
       <!-- <p>
        <textarea id="<?php echo $this->get_field_id( 'txt' ); ?>" name="<?php echo $this->get_field_name( 'txt' ); ?>" class="widefat" cols="20" rows="16"><?php echo $instance['txt']; ?></textarea>
        </p>  -->
                 
        <?php
    }
    // save 
     function update( $new_instance, $old_instance ) 
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );

        $instance['image'] = $new_instance['image'];
        
        $instance['link'] = $new_instance['link'];
        
        //$instance['txt'] = $new_instance['txt'];

        return $instance;
    }

    // add to display
    function widget( $args, $instance )
    {
        extract( $args );

       // $title = apply_filters('widget_title', $instance['title'] );
		$link = esc_attr($instance['link']);
		//$txt = $instance['txt'];
		
		echo $before_widget;                   
		
        $output = '';

        $output .= '<div class="collumn col4">';
        $output .= '<div class="widget-map">';

        if(trim($link)!==''){
         
        $output .='<a href="' . $link . '" title="' . $instance['title'] . '" target="_blank" >'; 
        $output .='<img src="'. aq_resize( $instance['image'],225,9999,true ) .'" alt="' . $instance['title'] . '" />';
        $output .='</a>';
           
        }else{

        $output .='<img src="' . aq_resize( $instance['image'],225,9999,true ) . '" alt="' . $instance['title'] . '" />';

        }

        $output .= '</div>';
        $output .= '</div>';

        echo $output;
        
        echo $after_widget;
    }                     

    
}     
?>
