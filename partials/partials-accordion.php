<?php

// Check if Accordion has rows of data


if ( have_rows('resources') ):
?> 
<li class="active has-sub">
   <h5><?php echo get_sub_field('resource_link'); ?></h5>
<?php
   while ( have_rows('resources') ) : the_row();

?>

   <ul>
      <a href="#">
      <li>
         <img src="#" alt="#">
         <h5>Link to a resource</h5>
      </li>
      </a>
   </ul>
</li>
<?php 

   endwhile;
   // No rows found
endif;

?>