<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <!-- banner -->
            <?php get_template_part('./partials/partials-banner', 'banner-section'); ?>
			<!-- /banner -->
		<?php endwhile; 
			wp_reset_postdata();
		endif; ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article class="gallery container">
			<!-- post title -->
			<h1 class="gallery--title pt-4">The Gallery</h1>
			<!-- /post title -->

			<!-- post gallery -->
			<div class="row">

				<!-- Modal Trigger -->
				<button type="button" class="btn btn-info" data_target="bootstrapModal">Open Modal</button>

			</div>
			<!-- /post gallery -->

			<?php the_content(); // Dynamic Content ?>

			<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

			<p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

			<p><?php _e( 'This post was written by ', 'html5blank' ); the_author(); ?></p>

			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

			<?php comments_template(); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
