<?php
/*
Template Name: Contact Us
*/
?>
<?php 
$nameError = '';
$emailError = '';
$messageError = '';
if(isset($_POST['submitted'])) {
		if(trim($_POST['contactname']) === '') {
			$nameError = __('Please enter your name.', SP_TEXT_DOMAIN);
			$hasError = true;
		} else {
			$name = trim($_POST['contactname']);
		}
		
		if(trim($_POST['email']) === '')  {
			$emailError = __('Please enter your email address.', SP_TEXT_DOMAIN);
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		if(trim($_POST['message']) === '') {
			$messageError = __('Please enter a message.', SP_TEXT_DOMAIN);
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$messages = stripslashes(trim($_POST['message']));
			} else {
				$messages = trim($_POST['message']);
			}
		}
			
		if(!isset($hasError)) {
			$emailTo = $smof_data['email'];
			$subject = 'From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nComments: $messages";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
	
} ?>

<?php get_header(); ?>

    <div id="main" role="main" class="clearfix">
    	
    	<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
			
    	<?php if(isset($emailSent) && $emailSent == true) { ?>
			<div class="success">
				<p class="success"><?php _e('Thanks, your email was sent successfully.', SP_TEXT_DOMAIN) ?></p>
			</div>
        <?php } ?>
    	
    	<div class="two-fourth">
	    	<form class="contact-page" action="<?php the_permalink(); ?>" id="contact-form" method="post">
	        	<p>
	        	<label for="name"><?php _e('Name', SP_TEXT_DOMAIN); ?> <font>*</font></label>
	            <input type="text" name="contactname" class="name" value="<?php if(isset($_POST['contactname'])) echo $_POST['contactname'];?>" />
	            <?php if($nameError != '') { ?>
	                <span class="error"><?php echo $nameError; ?></span> 
	            <?php } ?>
	        	</p>
	            
	            <p>
	            <label for="email"><?php _e('E-mail', SP_TEXT_DOMAIN); ?> <font>*</font></label>
	            <input type="text" name="email" class="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" />
	            <?php if($emailError != '') { ?>
	                <span class="error"><?php echo $emailError; ?></span>
	            <?php } ?>
	            </p>
	            
	            <p>
	            <label for="message"><?php _e('Message', SP_TEXT_DOMAIN); ?> <font>*</font></label>
	            <textarea name="message" cols="81" rows="5" class="message"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
	            <?php if($messageError != '') { ?>
	                <span class="error"><?php echo $messageError; ?></span> 
	            <?php } ?>
	            </p>
	            
	            <input type="hidden" name="submitted" id="submitted" value="true" />
	            <button id="submit" type="submit" class="button"><?php _e('Send', SP_TEXT_DOMAIN) ?></button>
	        </form>
    	</div><!-- .two-fourth -->
    	
    	<div class="two-fourth last">
    	
    	<!--Map-->
		<div id="map-wide">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">					
		  jQuery(document).ready(function ($)
			{
				var latitude = <?php echo $smof_data['map_lat'];?>;
				var longitude = <?php echo $smof_data['map_long'];?>;
				var myLatlng = new google.maps.LatLng(latitude, longitude);
				var myOptions = {	
				  scrollwheel: false, 						  
				  zoom: 15,
				  center: myLatlng,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(document.getElementById("c-map"), myOptions);
				
				var marker = new google.maps.Marker({
					position: myLatlng, 
					map: map,
					animation: google.maps.Animation.DROP,
					title:"<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>"
				});
			});
		</script>
		<div id="c-map"></div>
		</div><!--/#map-wide-->
    	
    	
		<?php
        if ( have_posts() ) :
			while ( have_posts() ) :
			the_post(); ?>
				<div class="entry-content contact-content">
					<?php the_content(); ?>
					
				</div><!-- .entry-content -->
		<?php endwhile;
        
        endif; ?>
    	</div> <!-- .two-fourth .last -->
    </div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>