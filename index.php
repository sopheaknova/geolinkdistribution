<?php
/**
 * @package WordPress
 * @subpackage Geolink
 * @since Geolink 1.0
 */
?>
<?php get_header(); ?>
<div class="wrap-container"> 
    <div class="container clearfix">
        <section>

          <?php $query = new WP_Query(array('post_type'=>'sp_slide'));?>
          <?php if ( $query->have_posts() ) : ?>
          <div id="feature-slide">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
               
          <?php if (has_post_thumbnail()) {
                the_post_thumbnail();
          }?>
          <?php endwhile; ?>
          </div>
          <!-- end class feature-slide -->
          <?php endif; ?> 
          <div class="slide-nav">
             <a id="slide-prev" href="">
                <img src="<?php bloginfo('template_url');?>/images/arrow-prev-big.png" alt="prev" /></a>
             <a id="slide-next" href="">
                <img src="<?php bloginfo('template_url');?>/images/arrow-next-big1.png" alt="next" /></a>
          </div>
          <div class="border-italic clearfix"></div>
        </section>
        <!-- end section -->
        <section>
           <div class="slogan">
             <img src="<?php bloginfo('template_url');?>/images/geolink-slogan.jpg" alt="slogan" />
           </div>
           <div class="learn-more">
                <a href="#">Learn more </a>  
           </div>
        </section>
        <!-- end section -->
        <section>
           <div class="geo-distribution">
               <h2><span class="white-back">Welcome to Geolink Distribution</span> <span class="border-italic"></span></h2>   
               <p>
               Geolink Distribution makes sure that you have the analysis, support and product growth to efficiently and 
               cost-effectively establish a foothold and supply network within the rapidly emerging yet socio-economically 
               complex Cambodian marketplace.</p>
               <p>Geolink Distribution is unmatched in Cambodia with a fleet of over 70 trucks and delivery vehicles, 
               modern and secure warehouses as well as over 12 sub-distributors in strategically key regions throughout 
               Cambodia.
               </p>
           </div>
           <div class="geo-group">
               <h3>Geolink Distribution</h3>
               <small>is owned by Geolink Group</small>
               <img src="<?php bloginfo('template_url');?>/images/geolink-group.png" alt="geolink group" />
           </div>
        </section>
        <!-- end section -->
        <section>
            <div class="geo-services">
                <h2><span class="white-back">Our Services</span> <span class="border-italic"></span></h2>
                <p>GeolinkGroup currently services exclusive contracts with DHL, Tiger Beer, and a list of all-star references, all of whom have trusted Geolink with their product 
                distribution for many years. This assures you that we work in a transparent, efficient, cost-effective and professional manner.</p>
            </div>

            <ul id="list-services" class="jcarousel-skin-tango">
              <li>
                <h3>Market Research</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-1.jpg"  alt="market-1" />
                <p>Igmaination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </li>
              <li>
                <h3>Customer Research</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-2.jpg" alt="market-2" />
                <p>Igmaination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </li>
              <li>
                <h3>Strategic Marketing</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-3.jpg" alt="market-3" />
                <p>Igmaination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </li>
              <li>
                <h3>Strategic Marketing</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-1.jpg" alt="market-1" />
                <p>Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </li>
              <li>
                <h3>Strategic Marketing</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-2.jpg" alt="market-2" />
                <p>Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </li>
              <li>
                <h3>Strategic Marketing</h3>
                <img src="<?php bloginfo('template_url');?>/images/market-3.jpg" alt="market-3" />
                <p>Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
              </li>

            </ul>
        </section>
        <!-- end section -->
        <section>
               
            <?php $query = new WP_Query(array('post_type'=>'sp_client', 'posts_per_page' => 12));?>
            <?php if ( $query->have_posts() ) : ?>
             
            <div class="geo-clients clearfix">
               <h2><span class="white-back">Some our past and current clients</span> <span class="border-italic"></span></h2>
            </div>

            <div class="all-clients clearfix">
            <ul id="list-clients" class="jcarousel-skin-tango">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <?php $meta_url = get_post_meta($post->ID, 'sp_client_url', true);  ?>
            <li>
            <?php 
            echo ( !empty($meta_url) ) ? '<a href="' . $meta_url . '" target="_blank" >' : '';
            if (has_post_thumbnail()) {
            	the_post_thumbnail('client-logo');
            }
            echo ( !empty($meta_url) ) ? '</a>' : '';
            ?>
            </li>
            <?php endwhile; ?>
            </ul>
            <!-- end class feature-slide -->
            </div>
            <?php endif; ?> 
           
        </section>
        <!-- end section -->
    </div>
    <!-- end class container -->
</div>

<!-- end class wrap-container -->
<?php get_footer(); ?>