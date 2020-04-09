<?php
/*
Template Name: Events-Page
Template Post Type: page
*/

// Date Variable
$today = date('Ymd');

// Custom Query Arguments
$args1 = array (
	'post_type' => 'events',
	'posts_per_page' => 200,
	'meta_key' => 'event_date',
	'meta_type' => 'numeric',
	'no_found_rows' => true,
	'orderby' => 'meta_value_num',
	'order' => 'ASC',
	'meta_query' => array(
		array(
			'key' => 'event_date',
			'compare' => '>=',
			'value' => $today,
			'type' => 'numeric'
		)
	)
);
$args2 = array (
	'post_type' => 'events',
	'posts_per_page' => 200,
	'meta_key' => 'event_date',
	'meta_type' => 'numeric',
	'no_found_rows' => true,
	'orderby' => 'meta_value_num',
	'order' => 'ASC',
	'meta_query' => array(
		array(
			'key' => 'event_date',
			'compare' => '<=',
			'value' => $today,
			'type' => 'numeric'
		)
	)
);

// Custom Query Variables
$upcoming_event = new WP_Query($args1);
$past_event = new WP_Query($args2);

get_header(); ?>

<main role="main">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<!-- banner -->
		<?php get_template_part('./partials/partials-banner', 'banner-section'); ?>
	<!-- /banner -->
	<?php endwhile; 
			wp_reset_postdata();
		endif; ?>
	<section class=container-fluid>
		<!-- Upcoming Events -->
		<article>
			<div class="row">
				<div class="col pt-4 d-flex justify-content-center">
					<h2>Upcoming Events</h2>
				</div>
			</div>
			<div class="row d-flex justify-content-around">
				<?php if($upcoming_event->have_posts() ) : while ( $upcoming_event->have_posts() ) : $upcoming_event->the_post(); ?>
				<?php get_template_part('./partials/partials-events-top-card', 'top-card'); ?>
				<?php endwhile; 
					wp_reset_postdata();
				endif; ?>

			</div>
		</article>
		<!-- /Upcoming Events -->

		<!-- Past Events -->
		<article>
			<div class="row">
				<div class="col pt-4 d-flex justify-content-center">
					<h2>Past Events</h2>
				</div>
			</div>
			<div class="row d-flex justify-content-around">
				<?php if($past_event->have_posts() ) : while ( $past_event->have_posts() ) : $past_event->the_post(); ?>
				<?php get_template_part('./partials/partials-events-bottom-card', 'bottom-card'); ?>
				<?php endwhile; 
					wp_reset_postdata();
				endif; ?>

			</div>
		</article>
		<!-- /Past Events -->
	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
