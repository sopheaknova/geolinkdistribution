<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_title; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

//General Setting
$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);
					
$of_options[] = array( 	"name" 		=> "Enable Prettyphoto",
						"desc" 		=> "Check to disable PrettyPhoto on this theme.",
						"id" 		=> "is_prettyphoto",
						"std" 		=> 0,
						"type" 		=> "switch"
				);				 								

$of_options[] = array( 	"name" 		=> "Main Custom Logo",
						"desc" 		=> "Upload a Png/Gif image that will represent your website's logo.",
						"id" 		=> "theme_logo",
						"std" 		=> SP_ASSETS_THEME . "images/logo.png",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Custom Favicon",
						"desc" 		=> "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
						"id" 		=> "theme_favico",
						"std" 		=> SP_BASE_URL . "favicon.ico",
						"type" 		=> "upload"
				); 				
				
				
$of_options[] = array( 	"name" 		=> "Tracking Code",
						"desc" 		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		=> "google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Footer Text",
						"desc" 		=> "You can use the following shortcodes in your footer text: [wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]",
						"id" 		=> "footer_text",
						"std" 		=> "GEOLINK DISTRIBUTION. Owned by GEOLINK GROUP. © 2013 All Right Reserved.",
						"type" 		=> "textarea"
				);																					
				
//Homepage
$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Cover Homepage",
						"desc" 		=> "Upload a Png/Gif/JPG image that will show under menu of homepage. Good size is 960px by 390px",
						"id" 		=> "home_cover",
						"std" 		=> SP_ASSETS_THEME . "images/cover-homepage.jpg",
						"type" 		=> "upload"
				);				
				
$of_options[] = array( 	"name" 		=> 'Select Homepage Content',
						"desc" 		=> "Select page that talk about welcome message to show on homepage",
						"id" 		=> "home_select",
						"type" 		=> "select",
						"options" 	=> $of_pages
				);				
				
$of_options[] = array( 	"name" 		=> 'Title for Owned by',
						"desc" 		=> "Write title message to show above logo bellow",
						"id" 		=> "owned_by_title",
						"std"		=> "<h5>Geolink Distribution</h5> <small>is owned by Geolink Group</small>",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Geolink group Logo",
						"desc" 		=> "Upload a Png/Gif image that will represent with title above and show them all on homepage.",
						"id" 		=> "goelink_group_logo",
						"std" 		=> SP_ASSETS_THEME . "images/geolink-group-logo.png",
						"type" 		=> "upload"
				);
				
$of_options[] = array( "name" => "Geolink Group Link",
						"desc" => "e.g: http://www.geolinkgroup.com/",
						"id" => "geolink_group_link",
						"std" => "http://www.geolinkgroup.com/",
						"type" => "text"
						);	
						
$of_options[] = array( "name" => "Section Client Title",
						"desc" => "e.g: Some our past and current clients",
						"id" => "client_title",
						"std" => "Some our past and current clients",
						"type" => "text"
						);											
				
$of_options[] = array( 	"name" 		=> 'Select Services Page',
						"desc" 		=> "Select page that present about services to show on homepage",
						"id" 		=> "service_select",
						"type" 		=> "select",
						"options" 	=> $of_pages
				);

//Social Networking
$of_options[] = array( 	"name" 		=> "Products",
						"type" 		=> "heading"
				);
								
$of_options[] = array( 	"name" 		=> 'Select Product Page',
						"desc" 		=> "Select page products",
						"id" 		=> "product_select",
						"type" 		=> "select",
						"options" 	=> $of_pages
				);																				
								
//Social Networking
$of_options[] = array( 	"name" 		=> "Social Networking",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Mini social networking on top",
						"desc" 		=> "Show/Hide mini social networking on top bar",
						"id" 		=> "topbar_social",
						"std" 		=> 1,
						"type" 		=> "switch"
				);				

$of_options[] = array( "name" => 'Custom Feed URL',
					"desc" => "",
					"id" => "introduction",
					"std" => "<h3>Custom Feed URL</h3>",
					"icon" => true,
					"type" => "info",
					);
									
	$of_options[] = array( "name" => "Hide Rss Icon",
						"desc" => "Hide rss icon in social widget",
						"id" => "rss_icon",
						"std" => 0,
						"type" => "switch"
						);
						
	$of_options[] = array( "name" => "Custom Feed URL",
						"desc" => "e.g: http://www.feedburner.com/userid",
						"id" => "rss_url",
						"std" => "",
						"type" => "text"
						);	
						
$of_options[] = array( "name" => 'Social Networking',
					"desc" => "",
					"id" => "introduction",
					"std" => "<h3>Social Networking</h3>",
					"icon" => true,
					"type" => "info",
					);

	$of_options[] = array( "name" => "Facebook URL",
						"id" => "social_facebook",
						"std" => "",
						"type" => "text"
						);	
	
	$of_options[] = array( "name" => "Twitter URL",
						"id" => "social_twitter",
						"std" => "",
						"type" => "text"
						);
						
	$of_options[] = array( "name" => "Google+ URL",
						"id" => "social_google_plus",
						"std" => "",
						"type" => "text"
						);
											
	$of_options[] = array( "name" => "LinkedIn URL",
						"id" => "social_linkedin",
						"std" => "",
						"type" => "text"
						);
											
	$of_options[] = array( "name" => "YouTube URL",
						"id" => "social_youtube",
						"std" => "",
						"type" => "text"
						);
											
	$of_options[] = array( "name" => "Vimeo URL",
						"id" => "social_vimeo",
						"std" => "",
						"type" => "text"
						);
											
	$of_options[] = array( "name" => "Skype URL",
						"id" => "social_skype",
						"std" => "",
						"type" => "text"
						);
											
	$of_options[] = array( "name" => "Delicious URL",
						"id" => "social_delicious",
						"std" => "",
						"type" => "text"
						);
											
	$of_options[] = array( "name" => "Instagram URL",
						"id" => "social_instagram",
						"std" => "",
						"type" => "text"
						);	
						
	$of_options[] = array( "name" => "Pinterest URL",
						"id" => "social_pinterest",
						"std" => "",
						"type" => "text"
						);		

// Contact
$of_options[] = array( "name" => "Contact",
					"type" => "heading");
					
$of_options[] = array( "name" => "Latitude",
					"desc" => "Latitude of google map see <a href='http://itouchmap.com'>itouchmap.com</a>",
					"id" => "map_lat",
					"std" => "11.569589",
					"type" => "text"
					);

$of_options[] = array( "name" => "Longitude",
					"desc" => "Longitude of google map see <a href='http://itouchmap.com'>itouchmap.com</a>",
					"id" => "map_long",
					"std" => "104.924315",
					"type" => "text"
					);
					
$of_options[] = array( "name" => "Email",
					"desc" => "",
					"id" => "email",
					"std" => "sales.gdc@geolinkgroup.com.kh",
					"type" => "text"
					);					
											
//Footer
$of_options[] = array( 	"name" 		=> "Footer Layout",
						"type" 		=> "heading"
				);	
				
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "Footer Columns",
						"desc" 		=> "Select footer columns to place widgets.",
						"id" 		=> "footer_layout",
						"std" 		=> "col-3",
						"type" 		=> "images",
						"options" 	=> array(
							'col-3' 	=> $url . '3c-footer.png',
							'col-4' 	=> $url . '4c-footer.png'
						)
				);
																													
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
