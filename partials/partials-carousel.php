<?php
// Check if Carousel has rows of data (CAROUSEL)
if ( have_rows('carousel_content') ):
   while ( have_rows('carousel_content') ) : the_row();
?>
    <div class="carousel-item">
        <div class="overlay"></div>
        <?php if (get_sub_field('carousel_image')): ?>
        <img class="d-block w-100" src="<?php echo get_sub_field('carousel_image')['url']; ?>" alt="<?php echo get_sub_field('carousel_image')['alt']; ?>">
        <?php endif;
        if (get_sub_field('carousel_text')): ?>
        <div class="carousel-caption d-block">
            <p><?php echo get_sub_field('carousel_text'); ?></p>
        </div>
        <?php endif; ?>
    </div>
<?php 
   endwhile;
   wp_reset_postdata();
endif;
?>