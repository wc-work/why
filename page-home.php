<?php 
/*
Template Name: Home-Page
Template Post Type: page
*/

get_header(); ?>
<!---------------------------- Carousel --------------------------->
<main class="page-home">
  <div class="carousel-wrapper container-fluid p-0 home-slider d-flex justify-content-center align-items-center">
    <div class="carousel">
      <img class="carousel__photo initial" src="<?php echo get_field('picture_1')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_2')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_3')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_4')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_5')['url'] ?>">

        <!----------------------- Carousel Buttons ------------------------->

      <div class="carousel__button--next"></div>
      <div class="carousel__button--prev"></div>

      <!-------------------- Carousel Text and Overlay ---------------------->

      <div class="overlay"></div>
      <div class=" content-wrapper d-flex justify-content-around align-items-center flex-column">
        <div class="title">
        <h2><?php the_field('carousel_text'); ?></h2>
        </div>
        <div class="facts-ask">
          <h2><?php the_field('carousel_text_2'); ?></h2>
        </div>
        <div class="facts">
          <?php the_field('facts'); ?>
        </div>
        <div class="slogan">
          <h3><?php the_field('carousel_text_3'); ?></h3>
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