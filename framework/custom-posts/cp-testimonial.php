<?php
/*
*****************************************************
* Testimonial custom post
*
* CONTENT:
* - 1) Actions and filters
* - 2) Creating a custom post
* - 3) Custom post list in admin
*****************************************************
*/





/*
*****************************************************
*      1) ACTIONS AND FILTERS
*****************************************************
*/
	//ACTIONS
		//Registering CP
		add_action( 'init', 'sp_testimonial_cp_init' );
		//CP list table columns
		add_action( 'manage_sp_testimonial_posts_custom_column', 'sp_testimonial_cp_custom_column' );

	//FILTERS
		//CP list table columns
		add_filter( 'manage_edit-sp_testimonial_columns', 'sp_testimonial_cp_columns' );




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'sp_testimonial_cp_init' ) ) {
		function sp_testimonial_cp_init() {
			global $cpTestimonialPosition;

			$role     = 'post'; // page
			$slug     = 'testimonial';
			$supports = array( 'title', 'editor' );
			//'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields'

			/*if ( $smof_data['sp_slide_revisions'] )
				$supports[] = 'revisions';*/

			$args = array(
				'query_var'           => 'testimonial',
				'capability_type'     => $role,
				'public'              => true,
				'show_ui'             => true,
				'exclude_from_search' => false,
				'hierarchical'        => false,
				'rewrite'             => array( 'slug' => $slug ),
				//'testimonial_position'       => $cpClientPosition['testimonial'],
				'menu_icon'           => SP_BASE_URL . 'framework/assets/img/testimonial.png',
				'supports'            => $supports,
				'labels'              => array(
					'name'               => __( 'Testimonial', 'sptheme_admin' ),
					'singular_name'      => __( 'Testimonial', 'sptheme_admin' ),
					'add_new'            => __( 'Add new testimonial', 'sptheme_admin' ),
					'add_new_item'       => __( 'Add new testimonial', 'sptheme_admin' ),
					'new_item'           => __( 'Add new testimonial', 'sptheme_admin' ),
					'edit_item'          => __( 'Edit testimonial', 'sptheme_admin' ),
					'view_item'          => __( 'View testimonial', 'sptheme_admin' ),
					'search_items'       => __( 'Search testimonial', 'sptheme_admin' ),
					'not_found'          => __( 'No testimonial found', 'sptheme_admin' ),
					'not_found_in_trash' => __( 'No testimonial found in trash', 'sptheme_admin' ),
					'parent_item_colon'  => ''
				)
			);
			register_post_type( 'sp_testimonial' , $args );
		}
	} // /sp_slide_cp_init





/*
*****************************************************
*      3) CUSTOM POST LIST IN ADMIN
*****************************************************
*/
	/*
	* Registration of the table columns
	*
	* $Cols = ARRAY [array of columns]
	*/
	if ( ! function_exists( 'sp_testimonial_cp_columns' ) ) {
		function sp_testimonial_cp_columns( $sp_testimonialCols ) {

			$sp_testimonialCols = array(
				//standard columns
				"cb"                 => '<input type="checkbox" />',
				"title"              => __( 'Testimonial', 'sptheme_admin' ),
				//$prefix . "category" => __( 'Category', 'sptheme_admin' ),
				"date"               => __( 'Date', 'sptheme_admin' ),
				"author"             => __( 'Created by', 'sptheme_admin' )
			);

			return $sp_testimonialCols;
		}
	} // /sp_slide_cp_columns

	/*
	* Outputting values for the custom columns in the table
	*
	* $Col = TEXT [column id for switch]
	*/
	if ( ! function_exists( 'sp_testimonial_cp_custom_column' ) ) {
		function sp_testimonial_cp_custom_column( $sp_testimonialCol ) {
			global $post;
			$prefix     = 'sp_testimonial-';
			$prefixMeta = 'testimonial-';

			switch ( $sp_testimonialCol ) {
				//case $prefix . "category":

				//	$terms = get_the_terms( $post->ID , 'slide-category' );
				//	if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
				//		foreach ( $terms as $term ) {
				//			$termName = ( isset( $term->name ) ) ? ( $term->name ) : ( null );
				//			echo '<strong>' . $termName . '</strong><br />';
				//		}
				//	}

				//break;
				case $prefix . "link":

					/*$sp_slideLink = esc_url( stripslashes( sp_meta_option( $prefixMeta . 'link' ) ) );
					echo '<a href="' . $sp_slideLink . '" target="_blank">' . $sp_slideLink . '</a>';*/
					echo '<a href="#" target="_blank">http://clientlinkurl</a>';

				break;
				default:
				break;
			}
		}
	} // /sp_client_cp_custom_column