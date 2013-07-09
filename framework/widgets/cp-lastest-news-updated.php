<?php
/*
*****************************************************
* List of Latest News Updated
*****************************************************
*/


/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/
class sp_latest_news_updated_widget extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id     = 'sp-latest-news-updated';
		$prefix = THEME_NAME . ': ';
		$name   = '<span>' . $prefix . __( 'Latest News Updated', 'sptheme_widget' ) . '</span>';
		$widget_ops = array(
			'classname'   => 'sp-latest-news-updated',
			'description' => __( 'List of recent post, Latest New Updated post.', 'sptheme_widget' )
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
		$type          = ( isset( $type ) ) ? ( $type ) : ( null );
		$category      = ( isset( $category ) ) ? ( $category ) : ( null );
		$count         = ( isset( $count ) && 0 < absint( $count ) ) ? ( absint( $count ) ) : ( 5 );
        $get_category  = ( isset( $get_category ) ) ? ( $get_category ) : ( null );
		
		//HTML to display widget settings form
		?>
		<p class="sp-desc"><?php _e( 'Displays advanced latest news updated. You just select Category Latest News Updated.', 'sptheme_widget' ) ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'sptheme_widget' ) ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'List type:', 'sptheme_widget' ); ?></label><br />
			<select class="widefat" name="<?php echo $this->get_field_name( 'type' ); ?>" id="<?php echo $this->get_field_id( 'type' ); ?>">
				<?php
				$options = array(
					'date,DESC,publish'          => __( 'Recent posts', 'sptheme_widget' ),
					'comment_count,DESC,publish' => __( 'Popular posts', 'sptheme_widget' ),
					'rand,DESC,publish'          => __( 'Random posts', 'sptheme_widget' ),
					'date,DESC,future'           => __( 'Upcoming posts', 'sptheme_widget' )
					);
				foreach ( $options as $optId => $option ) {
					?>
					<option <?php echo 'value="'. $optId . '" '; selected( $type, $optId ); ?>><?php echo $option; ?></option>
					<?php
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category Latest News Updated:', 'sptheme_widget' ); ?></label><br />
			<select class="widefat" name="cat-latest-news" id="<?php echo $this->get_field_id( 'category' ); ?>">
				
				<?php // testing
				
				$args = array(
							'type'                     => 'post',
							'orderby'                  => 'name',
							'order'                    => 'ASC',
							'taxonomy'                 => 'category');
				
				$categories = get_categories($args);
				foreach($categories as $cat){
	 	   	  	          	  
                    if($cat->parent == 0 ){ ?>
                    <option <?php echo 'val?ue="'.$parent = $cat->name.'"'; selected( $category, $optId );?>><?php echo $parent = $cat->name; ?></option>
                      	
                <?php    }// end if parent
	   	  	    }
				?>
			</select>
		</p>


		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Posts count:', 'sptheme_widget' ) ?></label><br />
			<input class="text-center" type="number" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $count; ?>" size="5" maxlength="2" />
		</p>
        

		<?php 
		
		// used this condition to category have been selected
		if(isset($_POST['cat-latest-news'])){
             $get_category =  $_POST['cat-latest-news'];
             echo $get_category;
     	} ?>
     	<input class="text-center" type="hidden" id="<?php echo $this->get_field_id( 'get_category' ); ?>" name="<?php echo $this->get_field_name( 'get_category' ); ?>" value="<?php echo $get_category; ?>" size="5" />
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
		$instance['type']          		= $new_instance['type'];
		$instance['category'] 		    = $new_instance['category'];
		$count                     		= ( 0 < absint( $new_instance['count'] ) ) ? ( absint( $new_instance['count'] ) ) : ( 5 );
		$instance['count']         		= $count;
		$instance['get_category'] 		    = $new_instance['get_category'];

		return $instance;
	} // /update


	/*
	*****************************************************
	*      output the widget content
	*****************************************************
	*/
	public function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$type          = ( isset( $type ) ) ? ( explode( ',', $type ) ) : ( array( 'date', 'DESC', 'publish' ) );
		$category      = ( isset( $category ) ) ? ( $category ) : ( 0 );
		$count         = ( isset( $count ) && 0 < absint( $count ) ) ? ( absint( $count ) ) : ( 5 );
		$get_category  = ( isset( $get_category ) ) ? ( $get_category ) : ( 0 );

		echo $before_widget;
			       
		wp_reset_query();

        // GET id from category
        $get_category_ID = get_cat_ID($get_category);

        $posts = new WP_Query( array(
				'posts_per_page'      =>$count,
				'post_type'=>'post',
				'cat'    =>  $get_category_ID  //$category 
			) );
		if ( $posts->have_posts() ) :

			//HTML to display output?>

        <div class="collumn col2">
        	<div class="widget-latest-news">
            
            <?php
		    $isEmpty = false;
	        //if the title is not filled, no title will be displayed
		    if ( isset( $title ) && '' != $title && ' ' != $title ){
			   echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;
		    }else{
			   $isEmpty = true;
		    }
		     echo $getCat;
		    // Is empty title widget
		    if($isEmpty){
				echo "<h4>Latest News Updated</h4>";
			}
		    ?>
            <div class="latest-news clearfix">
            <ul>
			<?php while ( $posts->have_posts() ) : $posts->the_post();
				$out = '<li>';

			    $out .= '<a href="' . get_permalink() . '"><h6>' . get_the_title() . '</h6></a>';

			    $date_format = get_the_date( 'F j, Y', $post_id ); // M j, Y
			    $out .= '<i>'.$date_format.'</i>';

                $out .= '</li>';
				echo $out;

			endwhile;?>
			</ul>
			</div>
			<!-- end .latest-news clearfix -->
            
            <a id="view-all" href="<?php echo get_category_link($get_category_ID);?>">View all news</a>
            </div>
            <!-- end .widget-latest-news -->
        </div>
        <!-- end .collumn col2 -->
            
			<?php
		endif;
		wp_reset_query();

		echo $after_widget;
	} // /widget

} // /sp_post_list
?>