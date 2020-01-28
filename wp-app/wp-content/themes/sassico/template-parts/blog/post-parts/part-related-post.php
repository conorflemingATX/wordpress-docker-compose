<?php

 $blog_related_post = sassico_option('blog_related_post','no');
 $blog_related_post_number = sassico_option('blog_related_post_number',3);

?>
<?php if($blog_related_post=="yes"): ?>
   <?php 
      $related_post = sassico_related_posts_by_tags($post->ID,$blog_related_post_number);
      
      if( $related_post->have_posts() ) {
         while ($related_post->have_posts()) : $related_post->the_post(); ?>
    
      <div class="recent-project-wrapper" style="float:left;padding-right:15px;">
         <div class="recent-project-img">
            
            <img style="height:200px;width:200px;" class="img-responsive" src="<?php echo get_the_post_thumbnail_url(); ?>" alt=" <?php the_title_attribute(); ?> ">
         </div>
         <!-- end recent-project-img -->
         <div class="recent-project-info">
            <p class="project-title"><?php echo get_the_date();  ?></p>
            <h3 class="ts-title"><a href="#"><?php the_title(); ?></a></h3>
         </div>
         <!-- end recent-project-info -->
      </div>
   
   <?php
     endwhile;
   }
    wp_reset_postdata();
  
  ?>
<?php endif; ?>
