<?php
// Check if Accordion has rows of data
if( have_rows('accordion') ):while ( have_rows('accordion') ) : the_row();         
?>
<li class="active has-sub">
   <h5><?php the_sub_field('resources'); ?></h5>
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
    endif;