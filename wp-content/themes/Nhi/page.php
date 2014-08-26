<?php

get_header();

?>
        <div class="row">
                <div class="col-md-1">
                &nbsp;
                </div>

                <div class="col-md-7">
                    <h2><?php echo $post->post_title;?></h2>
                    <p>
                    <?php echo apply_filters( 'the_content',$post->post_content);?>
                    </p>
                </div>
                
                <div class="col-md-3 area-sidebar">
                 <?php dynamic_sidebar('area-sidebar');?>
                </div>

                <div class="col-md-1">
                &nbsp;
                </div>

        </div>

<?php

get_footer();