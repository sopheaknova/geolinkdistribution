<!DOCTYPE html >

<!--[if IE 7]> <html class="ie7 no-js"  <![endif]-->
<!--[if lte IE 8]> <html class="ie8 no-js"  <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="not-ie no-js" > <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title('|', true, 'right'); ?></title>

<link rel="shortcut icon" href="<?php bloginfo('template_url');?>/geolink-ico.ico" type="image/x-icon" /> 

<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/selectivizr-1.0.2/selectivizr.js"></script>
  <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
<![endif]--> 

<?php wp_head(); ?>
</head>
<body>
    <div class="wrapper clearfix">
        <header>
            <section class="top-contact">
                <div class="container clearfix">
                    <div class="top-contact-phone">Call us : +123 4567890</div>
                    <div class="top-contact-social clearfix">
                        <div class="icon-social ">
                        <img id="facebook" src="<?php bloginfo('template_url');?>/images/icon-facebook.png" alt="icon-facebook" />
                        <img id="twitter" src="<?php bloginfo('template_url');?>/images/icon-twitter.png" alt="icon-twitter" />
                        <img id="youtube" src="<?php bloginfo('template_url');?>/images/icon-youtube.png" alt="icon-youtube" />
                        </div>
                        <form name="form-search" id="form-search" method="post">
                            <input type="text" name="textsearch" id="textsearch"/>
                            <input type="submit" name="submitsearch" id="submitsearch" />
                        </form>
                    </div>
                </div>
                <!-- end class container -->
            </section>
            <!-- end class top-contact -->
            <section class="logo-and-menu">
                <div class="container clearfix">
                    <div class="logo">
                    	<a href="http://localhost/nova-development/wp/">
                    		<img src="<?php bloginfo('template_url');?>/images/geolink.png" alt="geolink" />
                    	</a>       
                    </div>
                    <nav class="main-menu">
                    	<?php echo sp_main_navigation(); ?>
                        <!--<ul>
                            <li><a href="#">HOME</a></li>
                            <li><a href="#">ABOUT US</a></li>
                            <li><a href="#">SERVICES</a></li>
                            <li><a href="#">RESEARCH AND ANALYSIS</a></li>
                            <li><a href="#">PRODUCTS</a></li>
                            <li><a href="#">CONTACT US</a></li>
                        </ul> -->
                    </nav>  
                </div>
                <!-- end class container -->
            </section>
            <!-- end class logo-and-menu -->
        </header>
        <!-- end header -->