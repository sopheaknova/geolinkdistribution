<?php
/*
*****************************************************
* Testimonials custom post
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
			global $cp_menu_position;

			$role     = 'post'; // page
			$slug     = 'testimonial';
			$supports = array('title', 'editor'); // 'title', 'editor', 'thumbnail'

			/*if ( $smof_data['sp_newsticker_revisions'] )
				$supports[] = 'revisions';*/

			$args = array(
				'query_var'           => 'testimonial',
				'capability_type'     => $role,
				'public'              => true,
				'show_ui'             => true,
				'show_in_nav_menus'	  => false,
				'exclude_from_search' => false,
				'hierarchical'        => false,
				'rewrite'             => array( 'slug' => $slug ),
				'menu_position'       => $cp_menu_position['testimonial'],
				'menu_icon'           => SP_ASSETS_ADMIN . 'images/icon-testimonial.png',
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
			register_post_type( 'testimonial' , $args );
		}
	} 


	
	