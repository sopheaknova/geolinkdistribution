    <?php global $smof_data; ?>
    <footer id="footer">
        <section>
           <div class="container clearfix">

              <?php get_sidebar('footer');?>
           </div>
           <!-- end class container -->
        </section>  
        <section>
           <div class="container clearfix">
               <div class="footer-menu">
                  <?php echo sp_footer_navigation();?>
                  
               </div>
               <?php if(trim($smof_data['footer_text'])!== ''){ ?>
                
               <div class="footer-copy">
                    <p><?php echo $smof_data['footer_text'];?></p>
               </div>
                
               <?php } ?>
               
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