
<li class="active has-sub">
   <?php if(get_field('image_3')): ?>
      <img src="<?php echo get_field('image_3')['url']; ?>" alt="<?php echo get_field('image_3')['alt']; ?>">
   <?php endif; ?>
   <h4 id="toggle" class="curves brochure">Brochures</h4>
   <ul>
      <?php
      // Check if Accordion has rows of data (BROCHURES)
      if ( have_rows('brochures') ):
         while ( have_rows('brochures') ) : the_row(); ?>
      <a href="<?php echo get_sub_field('upload_brochure')['url']; ?>">
         <li>
            <h5><?php echo get_sub_field('upload_brochure')['title']; ?></h5>
         </li>
      </a>
      <?php 
         endwhile;
         // No rows found
      endif; ?>
   </ul>
</li>
