<?php 
/*
Template Name: Home-Page
Template Post Type: page
*/

get_header(); ?>

<main class="page-home">
  <div class="carousel-wrapper container-fluid home-slider">
    <div class="carousel">
      <img class="carousel__photo initial" src="<?php echo get_field('picture_1')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_2')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_3')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_4')['url'] ?>">
      <img class="carousel__photo" src="<?php echo get_field('picture_5')['url'] ?>">
        
      <div class="carousel__button--next"></div>
      <div class="carousel__button--prev"></div>
      <div class="overlay"></div>
      <div class="title"><h1>We Hear You</h1></div>
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
          <h2>History</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto explicabo, autem unde sint commodi rem iure repellat fugit minus non distinctio ipsum, voluptates ab. Eveniet, tempora vitae a amet odit fuga tempore. Minus, error, delectus excepturi molestiae laboriosam consectetur provident optio expedita laudantium earum laborum. Deleniti, eveniet quisquam?
          </p>
        </div>
        <div class="col-12 col-md-6 box-three box">
          <h2>What We Do</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto explicabo, autem unde sint commodi rem iure repellat fugit minus non distinctio ipsum, voluptates ab. Eveniet, tempora vitae a amet odit fuga tempore. Minus, error, delectus excepturi molestiae laboriosam consectetur provident optio expedita laudantium earum laborum. Deleniti, eveniet quisquam?
          </p>
        </div>
        <div class="col-12 col-md-6 box-four box">
          <h2>Why Give to W.H.Y.</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto explicabo, autem unde sint commodi rem iure repellat fugit minus non distinctio ipsum, voluptates ab. Eveniet, tempora vitae a amet odit fuga tempore. Minus, error, delectus excepturi molestiae laboriosam consectetur provident optio expedita laudantium earum laborum. Deleniti, eveniet quisquam? fugit minus non distinctio ipsum, voluptates ab. Eveniet, tempora vitae a amet odit fuga tempore. Minus, error, delectus excepturi molestiae laboriosam consectetur provident optio expedita laudantium earum laborum. Deleniti, eveniet quisquam?
          </p>
        </div>
      </div>
  </section>
</main>




<?php get_footer(); ?>