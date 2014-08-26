       <div class="row footer">
                <div class="col-md-1">
                &nbsp;
                </div>
                
                <?php dynamic_sidebar('area-footer-right');?>
                
                <div class="col-md-1">
                &nbsp;
                </div>
        </div>
    
    </div>
    <script type="text/javascript">
        jQuery('.btn').click(function(){
            var txt=this.href;
           window.location.replace(txt);
        });

        
        jQuery('ul.nav li.dropdown').hover(function() {
          jQuery(this).find('.multi-level').stop(true, true).delay(100).fadeIn();
        }, function() {
          jQuery(this).find('.multi-level').stop(true, true).delay(100).fadeOut();
        });     
        
        jQuery('ul.nav li.dropdown ul.multi-level').hover(function() {
          jQuery(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn();
        }, function() {
          jQuery(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut();
        });  
        
         jQuery('.bntslide').hover(function(){
             jQuery('.txtp').hide();
           var txtId=this.id;
             jQuery('#p'+txtId).show();
         });         
    </script>
    <?php wp_footer();?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/bootstrap.min.js"></script>
  </body>
</html>