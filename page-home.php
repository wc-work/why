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
      <div class=" content-wrapper d-flex justify-content-around align-items-center flex-column">
        <div class="title">
          <img class="logo-title" src="<?php echo get_field('main_logo')['url'] ?>">
        </div>
        <div class="facts-ask">
          <h2><?php the_field('carousel_heading'); ?></h2>
        </div>
        <div class="facts">
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

  

  <!-------------------------- Our Story Content------------------------------------>

  <section class="container home-content">
    <div class="row d-flex justify-content-center mt-3">
      <h1 class="our-story">Our Story</h1>
    </div>
      <div class="row no-gutters squares-container">
        <div class="col-xs-12 col-md-6 box">
        <img class="team-photo" src="<?php echo get_field('our_story_photo')['url'] ?>">
        </div>
        <div class="col-12 col-md-6 box-two box">
          <h2><?php the_field('heading_1'); ?></h2>
          <p><?php the_field('box_1'); ?></p>
        </div>
        <div class="col-12 col-md-6 box-three box">
          <h2><?php the_field('heading_2'); ?></h2>
          <p><?php the_field('box_2'); ?></p>
        </div>
        <div class="col-12 col-md-6 box-four box">
          <h2><?php the_field('heading_3'); ?></h2>
          <p><?php the_field('box_3'); ?></p>
        </div>
      </div>
  </section>
</main>




<?php get_footer(); ?>