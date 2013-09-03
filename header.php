<?php
/**
 * The Header
 */

/* Fetch theme options variables required in this template */
global $smof_data;
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width" />

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="clearfix">
		
        <div id="utility-top">        
            <div class="container clearfix">
            
            <div id="search-bar" role="complementary">
                <?php get_search_form(); ?>
            </div><!-- #search-bar -->
            
            <?php 
			if ($smof_data['topbar_social']) 
				sp_get_social( 'yes' , 'flat' , 'tooldown' , true ); 
			?>
            
            </div><!-- end .container .clearfix -->
        </div><!-- #utility-top .clearfix -->    
		<header id="header" class="site-header" role="banner">
		<div class="container clearfix">
            <div class="brand" role="banner">
                <?php if( !is_singular() ) echo '<h1>'; else echo '<h2>'; ?>
                
                <a  href="<?php echo home_url() ?>/"  title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
                    <?php if($smof_data['theme_logo']) : ?>
                    <img src="<?php echo $smof_data['theme_logo']; ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" />
                    <?php else: ?>
                    <span><?php bloginfo( 'name' ); ?></span>
                    <?php endif; ?>
                </a>
                
                <?php if( !is_singular() ) echo '</h1>'; else echo '</h2>'; ?>
            </div><!-- end .logo -->
            
            <nav id="main-nav" class="primary-nav" role="navigation">
            <?php echo sp_main_navigation(); ?>
            </nav><!-- #main-nav -->
            
		</div><!-- end .container .clearfix -->
        </header><!-- end #header -->
        
        <div id="content">
        <?php if (is_home()) : ?>
        		<div class="home-cover">	
        			<img src="<?php echo $smof_data['home_cover']; ?>" width="960" height="390" />
        		</div>
        <?php endif; ?>
        <?php if (is_page_template('template-contact.php')) : ?>
        		<div class="contact-cover">	
        			<img src="<?php echo $smof_data['contact_cover']; ?>" width="960" height="200" />
        		</div>
        <?php endif; ?>		
        <div class="container clearfix">