<?php
/*
*****************************************************
* Contact information widget
*****************************************************
*/

/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/
class sp_contact_info_widget extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id     = 'sp-contact-info';
		$prefix = THEME_NAME . ': ';
		$name   = '<span>' . $prefix . __( 'Contact Us', 'sptheme_widget' ) . '</span>';
		$widget_ops = array(
			'classname'   => 'sp-contact-info',
			'description' => __( 'Contact information', 'sptheme_widget' )
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
	function form( $instance ) {
		extract( $instance );
		$title    = ( isset( $title ) ) ? ( $title ) : ( null );
		//$name     = ( isset( $name ) ) ? ( $name ) : ( null );
		$address  = ( isset( $address ) ) ? ( $address ) : ( null );
		$phone_line1    = ( isset( $phone_line1 ) ) ? ( $phone_line1 ) : ( null );
		$phone_line2    = ( isset( $phone_line2 ) ) ? ( $phone_line2 ) : ( null );
		$fax   = ( isset( $fax ) ) ? ( $fax ) : ( null );
		$email    = ( isset( $email ) ) ? ( $email ) : ( null );
		$websit    = ( isset( $websit ) ) ? ( $websit ) : ( null );

		//HTML to display widget settings form
		?>
		<p class="sp-desc"><?php _e( 'Displays specially styled contact information. JavaScript anti-spam protection will be applied on the email address (also, email will not be displayed when JavaScript is turned off).', 'sptheme_widget' ) ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'sptheme_widget' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<!--<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:', 'sptheme_widget' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
		</p> -->

		<p>
			<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:', 'sptheme_widget' ) ?></label><br />
			<textarea cols="50" rows="5" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>"><?php echo esc_attr( $address ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'phone_line1' ); ?>"><?php _e( 'Phone Line 1:', 'sptheme_widget' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'phone_line1' ); ?>" name="<?php echo $this->get_field_name( 'phone_line1' ); ?>" type="text" value="<?php echo esc_attr( $phone_line1 ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'phone_line2' ); ?>"><?php _e( 'Phone Line 2:', 'sptheme_widget' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'phone_line2' ); ?>" name="<?php echo $this->get_field_name( 'phone_line2' ); ?>" type="text" value="<?php echo esc_attr( $phone_line2 ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'fax' ); ?>"><?php _e( 'FAX :', 'sptheme_widget' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" type="text" value="<?php echo esc_attr( $fax ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'websit' ); ?>"><?php _e( 'Web Site :', 'sptheme_widget' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'websit' ); ?>" name="<?php echo $this->get_field_name( 'websit' ); ?>" type="text" value="<?php echo esc_attr( $websit ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email address:', 'sptheme_widget' ) ?></label>
			<textarea cols="50" rows="2" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>"><?php echo esc_attr( $email ); ?></textarea>
			<small><?php _e( 'JavaScript anti-spam protection applied', 'sptheme_widget' ); ?></small>
		</p>

		<?php
	} // /form



	/*
	*****************************************************
	*      process and save the widget options
	*****************************************************
	*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']   = $new_instance['title'];
		//$instance['name']    = $new_instance['name'];
		$instance['address'] = $new_instance['address'];
		$instance['phone_line1']   = $new_instance['phone_line1'];
		$instance['phone_line2']   = $new_instance['phone_line2'];
		$instance['fax']   = $new_instance['fax'];
		$instance['email']   = $new_instance['email'];
		$instance['websit']   = $new_instance['websit'];

		return $instance;
	} // /update



	/*
	*****************************************************
	*      output the widget content
	*****************************************************
	*/
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

        $out = $outAddress = '';
        $isempty = false;
        $out .= '<div class="collumn col3">';
        $out .= '<div class="widget-address">';

        //HTML to display output

		//if the title is not filled, no title will be displayed
		if ( isset( $title ) && trim($title)!=='' ){

			$out .= $before_title . apply_filters( 'widget_title', $title ) . $after_title;

		}else{

			if(trim($address)!==''||trim( $phone_line1 )!==''||trim($fax)!==''||trim($email)!==''||trim($websit)!==''){
			$out .= '<h4>Office Address:</h4>';
			}

			
		}

		//address
		if ( ( isset( $address ) && trim($address)!=='' ) )
		
			$out .= '<p>' . $address . '</p>';

		//email addresses
        
        //phone numbers
        if ( trim( $phone_line1 )!=='' || trim($phone_line2)!=='' ){

        	$outAddress .= 'Phone : '. $phone_line1;
            $outAddress .= $phone_line2===''?'</br>':' / '.$phone_line2.'</br>'; 

        }
        // FAX
        if ( isset( $fax ) && trim($fax)!=='' ) {

			$outAddress .= 'FAX : ' . $fax.'</br>';
		}
        // E-mail
		if ( isset( $email ) && trim($email)!=='' ) {
			//$regex = '/(\S+@\S+\.\S+)/i';
			//preg_match_all( $regex, $email, $emailArray );
			//if ( $emailArray && is_array( $emailArray ) ) {
			//	foreach ( $emailArray[0] as $e ) {
			//		$email = str_replace( $e, '<a href="#" data-address="' . sp_nospam( $e ) . '" class="email-nospam">' . sp_nospam( $e ) . '</a>', $email );
			//	}
			//}
			$outAddress .= 'Email : ' . $email.'</br>';
		}
		// Website
		if ( isset( $websit ) && trim($websit)!=='' ) {

			$outAddress .= 'Website : ' . $websit.'</br>';
		}
			
		//output wrapper
		if ( $outAddress ){

            $out .= '<p>' . apply_filters( 'sp_default_content_filters', $outAddress ) . '</p>';
			$isempty = true;
		}

		$out .= '</div>';
		$out .= '</div><!-- end .collumn col3 -->';

		if ( $out )
			echo $before_widget . $out . $after_widget;


	} // /widget
} // /sp_contact_info

?>