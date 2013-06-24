    <footer id="footer">
        <section>
           <div class="container clearfix">
              <div class="collumn col1">
                  <div class="widget-text">
                      <?php $custom = new WP_Query(array('post_type'=>'sp_testimonial', 'posts_per_page'=>1));?>
                      <?php if ( $custom->have_posts() ) : ?>
                      <h4>Testimonial</h4>

                      <?php while ( $custom->have_posts() ) : $custom->the_post(); ?>
                      <div class="background-tip"><?php the_content(); ?></div>
                      <div class="tip"></div>
                      <div class="name-position">
                      <h6><strong><?php the_title();?></strong></h6>

                      <?php $meta_url = get_post_meta($post->ID, 'sp_user_position', true);  ?>
                      <?php if(trim($meta_url)!==""){ ?>

                      <small><?php echo $meta_url;?></small>
                      <?php }?>
                      
                      </div>
                      <?php endwhile; ?>
                      <?php endif; ?>
                      
                    
                  </div>
              </div>
              <!-- end class col1 -->
              <div class="collumn col2">
                  <div class="widget-latest-news">
                      <h4>Latest news updated</h4>
                      <div class="latest-news clearfix">
                         <ul>
                             <li><a href="http://localhost/nova-development/wp/?p=32">
                                 <h6>Geolink Distribute has won DKSH 2013 bidding for their Customs clearance operations</h6>
                                 </a>
                                 <i>January 3, 2013</i>
                             </li>
                             <li><a href="http://localhost/nova-development/wp/?p=40">
                                 <h6>Pellentesque mauris sapien</h6>
                                 </a>
                                 <i>January 3, 2013</i>
                             </li>
                             <li><a href="http://localhost/nova-development/wp/?p=44">
                                 <h6>Pellentesque mauris sapien Quisque eleifend magna</h6>
                                 </a>
                                 <i>January 3, 2013</i>
                             </li>

                         </ul>
                      </div>
                      <a id="view-all" href="">View all news</a>
                  </div>
              </div>
              <!-- end class col2 -->
              <div class="collumn col3">
                  <div class="widget-address">
                      <h4>Office address:</h4> 
                      <p>
                         No.41-43, Norodom Blvd
                         Sankat Phsar Thmey III, Khan Daun Penh, Phnom Penh, Cambodia
                      </p>
                      <p>
                         Phone : +855 23 222 399 <br>
                         FAX : +855 23 222 199 <br>
                         Email : info@domain.com.kh <br>
                         Website : www.domain.com.kh <br>
                      </p>
                  </div>
              </div>
              <!-- end class col3 -->
              <div class="collumn col4">
                  <div class="widget-map">
                  <a href=""><img src="<?php bloginfo('template_url');?>/images/cambodia-map.jpg" alt="cambodia-map" /></a>
                  </div>
              </div>
              <!-- end class col4 -->
           </div>
           <!-- end class container -->
        </section>  
        <section>
           <div class="container clearfix">
               <div class="footer-menu">
                  <?php echo sp_footer_navigation();?>
                  <!--<ul>
                      <li>Home</li>
                      <li>About Us</li>
                      <li>Services</li>
                      <li>Research and Analysis</li>
                      <li>Cambodia White Pepare</li>
                      <li>Products</li>
                      <li>Contact Us</li>
                  </ul> -->
               </div>
               <div class="footer-copy">
                    <p>GEOLINK DISTRIBUTION. Owned by GEOLINK GROUP. &copy; 2013 All Right Reserved.</p>
               </div>
           </div>
           <!-- end class container -->
        </section>
    </footer>
    <!-- end footer -->
</div>
<!-- end class wrapper -->
<?php wp_footer(); ?>

</body>
</html>