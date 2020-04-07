<?php 
/*
Template Name: Home-Page
Template Post Type: page
*/

get_header(); ?>
<!---------------------------- Carousel --------------------------->
<main class="page-home">
  <div class="carousel-wrapper">
    <?php if (have_posts()): 
      while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>

      <?php 
      endwhile; 
    endif; ?>
  </div>
    <!-------------------- Carousel Text and Overlay ---------------------->
    
    <div class="content-wrapper d-flex justify-content-around align-items-center flex-column">
      <!-- Logo -->
      <img class="logo-title" src="<?php echo get_field('main_logo')['url'] ?>">
      <!-- Carousel Heading -->
      <div class="carousel-heading">
        <h2><?php the_field('carousel_heading'); ?></h2>
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
      <?php if(get_field('box_4_button')): ?>
      <a href=""><button class="donate-button">Donate</button></a>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>