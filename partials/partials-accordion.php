
<li class="active has-sub">
   <h4 class="links">Resource Links</h4>
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
               <li>
                  <h5><?php echo get_sub_field('add_link')['title']; ?></h5>
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

<?php
// Check if Accordion has rows of data (DOCUMENTS)

if ( have_rows('documents') ):
   while ( have_rows('documents') ) : the_row();
?>
<li class="active has-sub">
   <h4>Documents</h4>
   <ul>
      <a href="#">
      <li>
         <img src="#" alt="#">
         <h5><?php echo get_sub_field('upload_document')['title']; ?></h5>
      </li>
      </a>
   </ul>
</li>
<?php 
   endwhile;
   // No rows found
endif;

// Check if Accordion has rows of data (BROCHURES)
if ( have_rows('brochures') ):
   while ( have_rows('brochures') ) : the_row();

?>
<li class="active has-sub">
   <h4>Brochures</h4>
   <ul>
      <a href="#">
      <li>
         <img src="#" alt="#">
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