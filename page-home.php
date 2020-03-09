<?php 
/*
Template Name: Home-Page
Template Post Type: page
*/

get_header(); ?>

<main class="page-home">
  <div class="carousel-wrapper container">
    <div class="carousel">
      <img class="carousel__photo initial" src="<?php echo get_field('picture_1')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_2')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_3')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_4')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_5')['url'] ?>">
        
      <div class="carousel__button--next"></div>
      <div class="carousel__button--prev"></div>
    </div>
  </div>

  <!-------------------------Carousel Text ------------------------>

  <!-------------------------- ------------------------------------>

  <section class="container home-content rounded">
    <div class="row d-flex justify-content-center mt-3">
      <h1 class="our-story">Our Story</h1>
    </div>
    <!-- <div class="info-cards-wrapper"> -->
      <div class="d-flex content centered">
        <div class="col row-one box-one box">Box</div>
        <div class="col row-one box-two box">Box</div>
        <div class="col row-two box-three box">Box</div>
        <div class="col row-two box-four box">Box</div>
      </div>
    <!-- </div> -->
  </section>
</main>




<?php get_footer(); ?>