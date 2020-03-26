<?php 
/*
Template Name: Contact-Page
Template Post Type: page
*/

get_header(); ?>

<div class="contact_image_wrapper">
    <img class="contact_image" src="<?php echo get_field('contact_header_image')['url'] ?>">
</div>
 


<?php echo do_shortcode( '[contact-form-7 id="60" title="Contact Us"]' ); ?>