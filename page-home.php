<?php 
/*
Template Name: Home-Page
Template Post Type: page
*/

get_header(); ?>
<!---------------------------- Carousel --------------------------->
<main class="page-home">
  <div class="carousel-wrapper container-fluid p-0 home-slider">
    <div class="carousel">
    <img class="carousel__photo initial" src="<?php echo get_field('carousel_photo_1')['url'] ?>">
    <?php
      // Check if pictures ACF has rows of data (CAROUSEL)
       if ( have_rows('pictures') ):
         while ( have_rows('pictures') ) : the_row();
    ?>
      <img class="carousel__photo" src="<?php echo get_sub_field('carousel_photo')['url'] ?>">
    <?php 
      endwhile;
      // No rows found
    endif;
    ?>
        <!----------------------- Carousel Buttons ------------------------->

      <div class="carousel__button--next"></div>
      <div class="carousel__button--prev"></div>

      <!-------------------- Carousel Text and Overlay ---------------------->

      <div class="overlay"></div>
      <div class="content-wrapper d-flex justify-content-around align-items-center flex-column">
        <img class="logo-title" src="<?php echo get_field('main_logo')['url'] ?>">
        <div class="carousel-heading">
          <h2><?php the_field('carousel_heading'); ?></h2>
        </div>
        <div class="carousel-subheading">
            <?php
              // Check if pictures ACF has rows of data (CAROUSEL)
              if ( have_rows('pictures') ):
                while ( have_rows('pictures') ) : the_row();
            ?>
          <p class="carousel__text" ><?php echo get_sub_field('carousel_text'); ?></p>
            <?php 
              endwhile;
             endif;
            ?>
        </div>
      </div>
    </div>
  </div>

  

  <!-------------------------- Main Section Content------------------------------------>

  <section class="container grid-container my-5">
    <div class="heading">
      <h1><?php the_field('main_heading') ?></h1>
    </div>
    <!-- Box 1 Image -->
    <img class="grid-box box-one" src="<?php echo get_field('box_1_image')['url'] ?>" alt="<?php echo get_field('box_1_image')['alt'] ?>">
    <!-- Box 2 Content -->
    <div class="grid-box box-two">
      <h2 class="box-heading"><?php the_field('box_2_header'); ?></h2>
      <p><?php the_field('box_2_text'); ?></p>
    </div>
    <!-- Box 3 Content -->
    <div class="grid-box box-three">
      <h2><?php the_field('box_3_header'); ?></h2>
      <p><?php the_field('box_3_text'); ?></p>
    </div>
    <!-- Box 4 Content -->
    <div class="grid-box box-four">
      <h2 class="box-heading"><?php the_field('box_4_header'); ?></h2>
      <p><?php the_field('box_4_text'); ?></p>
    </div>
  </section>
</main>

<?php get_footer(); ?>