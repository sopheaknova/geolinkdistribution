<?php
/*
Template Name: Contact Us
*/
?>
<?php 
global $smof_data;

$nameError = '';
$emailError = '';
$websiteError = '';
$messageError = '';
$errorMail = '';
if(isset($_POST['btnsubmit'])) {
		if(trim($_POST['contactname']) === '') {
			$nameError = __('Please enter your name.', 'sptheme');
			$hasError = true;
		} else {
			$name = trim($_POST['contactname']);
		}
		
		if(trim($_POST['email']) === '')  {
			$emailError = __('Please enter your email address.', 'sptheme');
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

	
		$website = trim($_POST['website']);
		if($website !== ''){
	        if (!filter_var($website,FILTER_VALIDATE_URL)) {
	        $websiteError = "You entered an invalid URL";
	        $hasError = true;
	        }
		}
		
		if(trim($_POST['comments']) === '') {
			$messageError = __('Please enter a message.', 'sptheme');
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$messages = stripslashes(trim($_POST['comments']));
			} else {
				$messages = trim($_POST['comments']);
			}
		}
			
		if(!isset($hasError)) {
			$emailTo = ''; //$smof_data['email'];
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = $smof_data['email'];
			}
			$subject = '[Contact Form] From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\n Website: $website \n\nComments: $messages";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			if(mail($emailTo, $subject, $body, $headers)){
				$emailSent = true;
			}else{

                $errorMail = "Your email has some error occured.";
				$emailSent = false;
			}
			
		}
	
} ?>


<?php get_header(); ?>

<!--Map of Geolink-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">					
 /* jQuery(document).ready(function ($)
	{
		var latitude = <?php //echo $smof_data['map_lat'];?>;
		var longitude = <?php //echo $smof_data['map_long'];?>;
		var myLatlng = new google.maps.LatLng(latitude, longitude);
		var myOptions = {
		  scrollwheel: false, 									  
		  zoom: 16,
		  center: myLatlng,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(document.getElementById("contact-map"), myOptions);
		
		var image = '<?php //echo SP_BASE_URL;?>images/pop-tea-marker.png';
		var marker = new google.maps.Marker({
			position: myLatlng, 
			map: map,
			icon: image,
			animation: google.maps.Animation.DROP,
			title:"<?php //echo esc_attr( get_bloginfo('name', 'display') ); ?>"
		});
	});  */
</script>
<div class="wrap-container"> 
    <div class="container clearfix">

        <h1 class="title"><?php echo the_title(); ?></h1>
        <section id="content-map">
            <h2><span class="white-back">Find us on the map</span> <span class="border-italic"></span></h2>
            <div id="contact-map"> 
            <img src="<?php bloginfo('template_url');?>/images/geolink-map.jpg" alt="geolink-map" />
            </div>
        </section>
        <!-- end section -->
        <section id="contact-info">
            <div class="contact-address">
                <h2><span class="white-back">Contact Info</span> <span class="border-italic"></span></h2>
                <ul>
                	<?php if(trim($smof_data['num-street'])!==''){ ?>
                    <li><?php echo $smof_data['num-street'];?></li>
                    <?php } ?>
                    <?php if(trim($smof_data['commune-district'])!==''){ ?>
                    <li><?php echo $smof_data['commune-district'];?></li>
                    <?php } ?>
                    <?php if(trim($smof_data['city-country'])!==''){ ?>
                    <li><?php echo $smof_data['city-country'];?></li>
                    <?php } ?>
                    <?php if(trim($smof_data['tel_1'])!==''||trim($smof_data['tel_2'])!==''){ ?>
                    <li>Phone : <?php echo $smof_data['tel_1']; echo $smof_data['tel_2']===''?'':' / '.$smof_data['tel_2'];?></li>
                    <?php } ?>
                    <?php if(trim($smof_data['fax'])!==''){ ?>
                    <li>FAX : <?php echo $smof_data['fax'];?></li>
                    <?php } ?>
                    <?php if(trim($smof_data['email'])!==''){ ?>
                    <li>Email : <?php echo $smof_data['email'];?></li>
                    <?php } ?>
                    <?php if(trim($smof_data['website'])!==''){ ?>
                    <li>Website : <?php echo $smof_data['website'];?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="contact-mail">
                <h2><span class="white-back">Get in Touch</span> <span class="border-italic"></span></h2>
                <form class="contact-form" action="" method="post">

                	<?php if(isset($emailSent) && $emailSent == true) { ?>
                        <div class="success">
                        <h5><?php _e('Thanks, your email was sent successfully.', 'sptheme') ?></h5>
                        </div>

                    <?php }else{ ?>
                        <label for="error" class="error-msg"><?php echo $errorMail; ?></label>
                    <?php } ?>
                    
                    <div class="semi-left">
                    	 <?php if($nameError != '') { ?>
                         <label for="error" class="error"><?php echo $nameError; ?></label> 
                         <?php } ?>
                         <input type="text" name="contactname" class="contactname" placeholder="NAME*" value="<?php if(isset($_POST['contactname'])) echo $_POST['contactname'];?>" />
                    </div> 
                    <div class="semi-right"> 
                    	 <?php if($emailError != '') { ?>
                         <label for="error" class="error"><?php echo $emailError; ?></label>
                         <?php } ?>
                         <input type="text" name="email" class="email" placeholder="EMAIL*" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" />
                    </div>
                    <div class="clear"></div>
                         <?php if($websiteError != ''){?>
                         <label for="error" class="error"><?php echo $websiteError; ?></label>
                         <?php }?>
                    <input type="text" name="website" class="website" placeholder="WEBSITE" value="<?php if(isset($_POST['website'])) echo $_POST['website'];?>" />

                    <?php if($messageError != '') { ?>
                    <label for="error" class="error"><?php echo $messageError; ?></label>
                    <?php } ?>
                    <textarea name="comments" class="comments" placeholder="COMMENT*">
                    <?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?>
                    </textarea>
                    
                 
                    <input type="submit" name="btnsubmit" class="btnsubmit" value="Send" />
                </form>
            </div>
        </section>
        <!-- end section -->
    </div>
    <!-- end class container -->
</div>

<!-- end class wrap-container -->
<?php get_footer(); ?>