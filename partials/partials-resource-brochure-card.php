<?php
// Check if Accordion has rows of data (BROCHURES)
if ( have_rows('brochures') ):
   while ( have_rows('brochures') ) : the_row();

?>
<li class="active has-sub">
   <h4 id="toggle" class="curves brochure">Brochures</h4>
   <ul>
      <li>
         <h5><?php echo get_sub_field('upload_brochure')['title']; ?></h5>
      </li>
      </a>
   </ul>
</li>
<?php 
   endwhile;
   // No rows found
endif;
?>