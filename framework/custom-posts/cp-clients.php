<?php
/*
*****************************************************
* client custom post
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
		add_action( 'init', 'sp_client_cp_init' );
		//CP list table columns
		add_action( 'manage_sp_client_posts_custom_column', 'sp_client_cp_custom_column' );

	//FILTERS
		//CP list table columns
		add_filter( 'manage_edit-sp_client_columns', 'sp_client_cp_columns' );




/*
*****************************************************
*      2) CREATING A CUSTOM POST
*****************************************************
*/
	/*
	* Custom post registration
	*/
	if ( ! function_exists( 'sp_client_cp_init' ) ) {
		function sp_client_cp_init() {
			global $cpClientPosition;

			$role     = 'post'; // page
			$slug     = 'client';
			$supports = array( 'title', 'thumbnail' );
			//'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields'

			/*if ( $smof_data['sp_slide_revisions'] )
				$supports[] = 'revisions';*/

			$args = array(
				'query_var'           => 'client',
				'capability_type'     => $role,
				'public'              => true,
				'show_ui'             => true,
				'exclude_from_search' => false,
				'hierarchical'        => false,
				'rewrite'             => array( 'slug' => $slug ),
				'client_position'       => $cpClientPosition['client'],
				'menu_icon'           => SP_BASE_URL . 'framework/assets/img/clients.png',
				'supports'            => $supports,
				'labels'              => array(
					'name'               => __( 'Client', 'sptheme_admin' ),
					'singular_name'      => __( 'Client', 'sptheme_admin' ),
					'add_new'            => __( 'Add new client', 'sptheme_admin' ),
					'add_new_item'       => __( 'Add new client', 'sptheme_admin' ),
					'new_item'           => __( 'Add new client', 'sptheme_admin' ),
					'edit_item'          => __( 'Edit client', 'sptheme_admin' ),
					'view_item'          => __( 'View client', 'sptheme_admin' ),
					'search_items'       => __( 'Search client', 'sptheme_admin' ),
					'not_found'          => __( 'No client found', 'sptheme_admin' ),
					'not_found_in_trash' => __( 'No client found in trash', 'sptheme_admin' ),
					'parent_item_colon'  => ''
				)
			);
			register_post_type( 'sp_client' , $args );
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
	if ( ! function_exists( 'sp_client_cp_columns' ) ) {
		function sp_client_cp_columns( $sp_clientCols ) {
			$prefix = 'sp_client-';

			$sp_clientCols = array(
				//standard columns
				"cb"                 => '<input type="checkbox" />',
				$prefix . "thumb"    => __( 'Image', 'sptheme_admin' ),
				"title"              => __( 'Client', 'sptheme_admin' ),
				//$prefix . "category" => __( 'Category', 'sptheme_admin' ),
				"date"               => __( 'Date', 'sptheme_admin' ),
				"author"             => __( 'Created by', 'sptheme_admin' )
			);

			return $sp_clientCols;
		}
	} // /sp_slide_cp_columns

	/*
	* Outputting values for the custom columns in the table
	*
	* $Col = TEXT [column id for switch]
	*/
	if ( ! function_exists( 'sp_client_cp_custom_column' ) ) {
		function sp_client_cp_custom_column( $sp_clientCol ) {
			global $post;
			$prefix     = 'sp_client-';
			$prefixMeta = 'client-';

			switch ( $sp_clientCol ) {
				//case $prefix . "category":

				//	$terms = get_the_terms( $post->ID , 'slide-category' );
				//	if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
				//		foreach ( $terms as $term ) {
				//			$termName = ( isset( $term->name ) ) ? ( $term->name ) : ( null );
				//			echo '<strong>' . $termName . '</strong><br />';
				//		}
				//	}

				//break;
				case $prefix . "thumb":
					
					$size = explode( 'x', SP_ADMIN_LIST_THUMB );
					echo '<a href="' . get_edit_post_link( $post->ID ) . '">' . get_the_post_thumbnail( $post->ID, $size, array( 'title' => get_the_title( $post->ID ) ) ) . '</a>';
						
				break;

					/*$sp_slideLink = esc_url( stripslashes( sp_meta_option( $prefixMeta . 'link' ) ) );
					echo '<a href="' . $sp_slideLink . '" target="_blank">' . $sp_slideLink . '</a>';*/
					echo '<a href="#" target="_blank">http://clientlinkurl</a>';

				break;
				default:
				break;
			}
		}
	} // /sp_client_cp_custom_column