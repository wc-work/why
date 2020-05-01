<?php 
/*
Template Name: Contact-Page
Template Post Type: page
*/

get_header(); ?>
<main role="main" class="main">
    <section>
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <!-- banner -->
            <?php get_template_part('./partials/partials-banner', 'banner-section'); ?>
			<!-- /banner -->
		<?php endwhile; 
			wp_reset_postdata();
		endif; ?>
    
        <div class="form-wrapper form pb-5">
                 <?php echo do_shortcode( '[contact-form-7 id="657" title="Contact Us"]' ); ?>
        </div>


    </section>

</main>

<?php get_footer(); ?>