<?php
// Check if Accordion has rows of data (DOCUMENTS)

if ( have_rows('documents') ):
   while ( have_rows('documents') ) : the_row();
?>
<li class="active has-sub">
   <h4 class="document">Documents</h4>
   <ul>
      <li>
         <h5><?php echo get_sub_field('upload_document')['title']; ?></h5>
      </li>
      </a>
   </ul>
</li>
<?php 
   endwhile;
   // No rows found
endif;