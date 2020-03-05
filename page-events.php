<?php
/*
Template Name: Events
Template Post Type: page
*/

$args1 = array(
	'post_type' => 'events',
	'post_per_page' => '6', 
	'orderby' => 'date',
	'order' => 'DESC'
); 
$args2 = array(
	'post_type' => 'past-events',
	'post_per_page' => '10',
	'orderby' => 'date',
	'order' => 'DESC'
);             

$upcoming_event_query = new WP_Query( $args1 );
$past_event_query = new WP_Query( $args2 );

get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <!-- banner -->
            <?php get_template_part('./partials/partials-banner', 'banner-section'); ?>
			<!-- /banner -->
		<?php endwhile; ?>
		<?php endif; ?>

            <!-- Upcoming Events -->
            <article class="container">
                <div class="row">

				<?php if($upcoming_event_query->have_posts() ) : while ( $upcoming_event_query->have_posts() ) : $upcoming_event_query->the_post(); ?>
					<?php get_template_part('./partials/partials-events-top-card', 'top-card'); ?>
				<?php endwhile; ?>
				<?php else: ?>	

				</div>
			</article>
			<!-- /Upcoming Events -->
		<?php endif; ?>

			<!-- Past Events -->
			<article class="container">
                <div class="row">

				<?php if($past_event_query->have_posts() ) : while ( $past_event_query->have_posts() ) : $past_event_query->the_post(); ?>
					<?php get_template_part('./partials/partials-events-bottom-card', 'bottom-card'); ?>
				<?php endwhile; ?>
				<?php else: ?>	

				</div>
			</article>
			<!-- /Past Events -->
		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>