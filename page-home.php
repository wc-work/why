<?php 
/*
Template Name: Home-Page
Template Post Type: page
*/

get_header(); ?>

<main class="page-home">
  
  <!----------------------------------- Carousel ----------------------------------------->
  <section>  
    <?php if (have_posts($post) ) : while ( have_posts($post) ) : the_post($post);  
          the_content();
        endwhile; 
          wp_reset_postdata(); 
    endif;?>	
  </section>
  <!-------------------------- Top Section Content ------------------------------------>
  <section class="container grid-container-1 py-5">
    <?php if(get_field('top_left_heading')): ?>
    <div class="heading-top-1">
      <h2><?php echo get_field('top_left_heading') ?></h1>
    </div>
    <?php endif; ?>
    <?php if(get_field('top_left_image')): ?>
    <div class="grid-img events">
      <h3 class="heading-space pt-2">Events</h3>
      <img src="<?php echo get_field('top_left_image')['url'] ?>" alt="<?php echo get_field('top_left_image')['alt'] ?>">
    </div>
    <?php endif; ?>
    <?php if(get_field('top_right_heading')): ?>
    <div class="heading-top-2">
      <h2><?php echo get_field('top_right_heading') ?></h1>
    </div>
    <?php endif; ?>
    <?php if(get_field('top_right_image')): ?>
    <div class="grid-img resources">
      <h3 class="heading-space pt-2">Resources</h3>
      <img src="<?php echo get_field('top_right_image')['url'] ?>" alt="<?php echo get_field('top_right_image')['alt'] ?>">
    </div>
    <?php endif; ?>
  </section>
  <!-------------------------- Main Section Content ------------------------------------>
  <section class="container grid-container-2 py-5">
    <div class="heading-main">
      <h1><?php the_field('main_heading') ?></h1>
    </div>
    <!-- Box 1 Image -->
    <img class="grid-box box-one" src="<?php echo get_field('box_1_image')['url'] ?>" alt="<?php echo get_field('box_1_image')['alt'] ?>">
    
    <?php if(get_field('box_2_header')): ?>
    <!-- Box 2 Content -->
    <div class="grid-box box-two">
      <h2 class="box-heading"><?php the_field('box_2_header'); ?></h2>
      <p><?php the_field('box_2_text'); ?></p>
    </div>
    <?php endif; ?>

    <?php if(get_field('box_3_header')): ?>
    <!-- Box 3 Content -->
    <div class="grid-box box-three">
      <h2><?php the_field('box_3_header'); ?></h2>
      <p><?php the_field('box_3_text'); ?></p>
    </div>
    <?php endif; ?>

    <?php if(get_field('box_4_header')): ?>
    <!-- Box 4 Content -->
    <div class="grid-box box-four">
      <h2 class="box-heading"><?php the_field('box_4_header'); ?></h2>
      <p><?php the_field('box_4_text'); ?></p>
      <?php if(get_field('box_4_button')): ?>
      <a href=""><button class="donate-button">Donate</button></a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </section>
  <!-- Bubble Animation -->
  <section>
    <ul class="bg-pulse">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </section>
</main>

<?php get_footer(); ?>