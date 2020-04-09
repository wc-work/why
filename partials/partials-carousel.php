<?php
// Check if Carousel has rows of data (CAROUSEL)
if ( have_rows('carousel_content') ):
   while ( have_rows('carousel_content') ) : the_row();
?>
    <div class="carousel-item">
        <div class="overlay"></div>
        <img class="d-block w-100" src="<?php echo get_sub_field('carousel_image')['url']; ?>" alt="<?php echo get_sub_field('carousel_image')['alt']; ?>">
        <div class="carousel-caption d-block">
            <p><?php echo get_sub_field('carousel_text'); ?></p>
        </div>
    </div>
<?php 
   endwhile;
   wp_reset_postdata();
endif;
?>