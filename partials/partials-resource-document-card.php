<li class="active has-sub">
   <?php if(get_field('image_2')): ?>
      <img src="<?php echo get_field('image_2')['url']; ?>" alt="<?php echo get_field('image_2')['alt']; ?>">
   <?php endif; ?>
   <h4 class="document">Documents</h4>
   <ul>
      <?php
      // Check if Accordion has rows of data (DOCUMENTS)
      if ( have_rows('documents') ):
         while ( have_rows('documents') ) : the_row(); ?>

      <a href="<?php echo get_sub_field('upload_document')['url']; ?>">
         <li>
            <h5><?php echo get_sub_field('upload_document')['title']; ?></h5>
         </li>
      </a>
      <?php 
         endwhile;
         // No rows found
      endif; ?>
   </ul>
</li>
