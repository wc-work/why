<?php 
/*
Template Name: Home-Page
Template Post Type: page
*/

get_header(); ?>

<div class="carousel-wrapper">
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





<?php get_footer(); ?>