<li class="active has-sub">
   <?php if(get_field('image_1')): ?>
      <img src="<?php echo get_field('image_1')['url']; ?>" alt="<?php echo get_field('image_1')['alt']; ?>">
   <?php endif; ?>
   <h4 class="link">Resource Links</h4>
   <ul>
      <?php
      // Check if Accordion has rows of data (RESOURCE LINKS)
      if ( have_rows('resource_links') ):
         while ( have_rows('resource_links') ) : the_row();
      ?>
      <li class="active has-sub">
         <h4><?php echo get_sub_field('category_name'); ?></h4>
         <?php if ( have_rows('category_links') ):
         while ( have_rows('category_links') ) : the_row(); ?>
         <ul>
            <a href="<?php echo get_sub_field('add_link')['url']; ?>">
               <li class="pb-1">
                  <h5><?php echo get_sub_field('add_link')['title']; ?></h5>
                  <p><?php echo get_sub_field('link_description'); ?></p>
               </li>
            </a>
         </ul>
         <?php 
         endwhile;
            // No rows found
      endif; ?>
      </li>
      <?php 
   endwhile;
   // No rows found
endif;?>
   </ul>
</li>