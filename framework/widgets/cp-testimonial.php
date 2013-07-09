<?php
/*
*****************************************************
* Custom Post Testimonial
*****************************************************
*/


/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/
class sp_post_testimonial_widget extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id     = 'sp-posts-testimonial';
		$prefix = THEME_NAME . ': ';
		$name   = '<span>' . $prefix . __( 'Testimonial', 'sptheme_widget' ) . '</span>';
		$widget_ops = array(
			'classname'   => 'sp-posts-testimonial',
			'description' => __( 'Note: This widget posts only recent post in Testimonial. ', 'sptheme_widget' )
			);
		$control_ops = array();

		//$this->WP_Widget( $id, $name, $widget_ops, $control_ops );
		parent::__construct( $id, $name, $widget_ops, $control_ops );
	} // /__construct



	/*
	*****************************************************
	*      widget options form in admin
	*****************************************************
	*/
	public function form( $instance ) {
		extract( $instance );
		$title         = ( isset( $title ) ) ? ( $title ) : ( null );
		//$excerptLength = ( isset( $excerptLength ) ) ? ( absint( $excerptLength ) ) : ( 10 );

		//HTML to display widget settings form
		?>
		<p class="sp-desc"><?php _e('Please Note: This widget posts or take only recent post in Testimonial.') ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title: ', 'sptheme_widget' ) ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p class="sp-desc">
        <!-- 
        <p>
			<label for="<?php echo $this->get_field_id( 'excerptLength' ); ?>"><?php _e( 'Excerpt length in:', 'sptheme_widget' ); ?></label><br />
			<select class="widefat" name="<?php echo $this->get_field_name( 'excerptLength' ); ?>" id="<?php echo $this->get_field_id( 'excerptLength' ); ?>">
				<?php
				$options = array(
					0  => 0,
					5  => 5,
					10 => 10,
					15 => 15,
					20 => 20,
					25 => 25,
					30 => 30,
					35 => 35,
					40 => 40
					);
				foreach ( $options as $optId => $option ) {
					?>
					<option <?php echo 'value="'. $optId . '" '; selected( $excerptLength, $optId ); ?>><?php echo $option; ?></option>
					<?php
				}
				?>
			</select>
		</p>  
		-->  
		<p>
		   <?php _e('Note: Limited only recent post in Testimonial.') ?>
		</p>

        
		<?php
	} // /form



	/*
	*****************************************************
	*      process and save the widget options
	*****************************************************
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']         		= $new_instance['title'];
       // $instance['excerptLength'] 		= absint( $new_instance['excerptLength'] );
		return $instance;
	} // /update



	/*
	*****************************************************
	*      output the widget content
	*****************************************************
	*/
	public function widget( $args, $instance ) {
		
		global $post;

        global $smof_data;

		extract( $args );
		extract( $instance );

        //$excerptLength = ( isset( $excerptLength ) ) ? ( absint( $excerptLength ) ) : ( 10 );

        //$class = '';   
       // if ( 0 === $excerptLength )
		//$class .= ' no-excerpt'; 

	    echo $before_widget;

		wp_reset_query();

		$posts = new WP_Query( array(
				'posts_per_page'      => 1,
				'post_type'=>'sp_testimonial'
			) );

		if ( $posts->have_posts() ) :

			//HTML to display output
			?>
		<div class="collumn col1">
			<div class="widget-text">

		    <?php
		    $isEmpty = false;

		    $get_page = $smof_data['page_testimonial'];  
		    $page = get_page_by_path($get_page); // GET page by slug
            $permalink = get_permalink( $page->ID );
                    
	        //if the title is not filled, no title will be displayed
		    if ( isset( $title ) && '' != $title && ' ' != $title ){
			   echo $before_title .'<a href="'.$permalink.'">'. apply_filters( 'widget_title', $title ) .'</a>'. $after_title;
		    }else{
			   $isEmpty = true;
		    }
		    ?>

			<?php
			if($isEmpty){
				echo '<h4><a href="'.$permalink.'">Testimonial</a></h4>';
			}
			while ( $posts->have_posts() ) : $posts->the_post();

				$content = $posts->post->post_excerpt . $posts->post->post_content;
              

				
				//excerpt
				/*if ( isset( $excerptLength ) && $excerptLength ) {
					$content = sp_string_length( strip_tags( $content ), $excerptLength, '&hellip;' );
					if ( $content )
						$out .= '<div class="background-tip">' . $content . '</div>';

					    // add tip
					    $out .= '<div class="tip"></div>';
				} */
				// add content
				$out .= '<div class="background-tip">'.$content.'</div>';
				// add tip
				$out .= '<div class="tip"></div>';
                $out .= '<div class="name-position">';
                // add title or Name Client Commnent
                $out .= "<h6><strong>";
                $out .= get_the_title(); // the_title()
                $out .= "</strong></h6>";
                // add position 
                $meta_url = get_post_meta($post->ID, 'sp_user_position', true);
                if(trim($meta_url)!==""){ 
                $out .= '<small>'.$meta_url.'</small>';
                }

                $out .= '</div>';
                
				echo $out;
			endwhile;
			?>
            </div>
		</div>
        <!-- end class col1 -->
			<?php
		endif;
		wp_reset_query();

		echo $after_widget;
	} // /widget

} // /sp_post_list

?>