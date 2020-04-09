<?php 
/*
Template Name: Home-Page
Template Post Type: page
*/

get_header(); ?>

<main class="page-home">
  <!----------------------------------- Carousel ----------------------------------------->
  <?php if(get_field('carousel_image_starter')): ?>
  <div id="carouselWeHearYou" class="carousel slide" data-keyboard="true" data-touch="true">
    <div class="carousel-inner">
      <div class="content-wrapper d-flex align-items-center flex-column">
        <!-- Logo -->
        <img class="logo-title pt-5" src="<?php echo get_field('main_logo')['url'] ?>">
        <!-- Carousel Heading -->
        <div class="carousel-heading pt-4">
          <h2><?php the_field('carousel_heading'); ?></h2>
        </div>
      </div>
      <div class="carousel-item active">
        <div class="overlay"></div>
        <img src="<?php echo get_field('carousel_image_starter')['url']; ?>" class="d-block w-100" alt="<?php echo get_field('carousel_image_starter')['alt']; ?>">
        <div class="carousel-caption d-block">
          <p><?php the_field('carousel_text_starter'); ?></p>
        </div>
      </div>
      <?php 
        if(have_posts() ) : 
          while ( have_posts() ) : the_post(); ?>
						<?php get_template_part('./partials/partials-carousel', 'carousel-section'); ?>
      <?php 
          endwhile; 
						wp_reset_postdata();
        endif; ?>	
    </div>
    <a class="carousel-control-prev" href="#carouselWeHearYou" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselWeHearYou" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <?php endif; ?>

  <!------------------------------ End Carousel ------------------------------------>
    
  
  
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