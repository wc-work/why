<?php
/*
Template Name: Events
Template Post Type: page
*/
 get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>


		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <!-- banner -->
            <?php get_template_part('./partials/partials-banner', 'banner-section'); ?>
            <!-- /banner -->

            <!-- article -->
            <section class="container">
                <div class="row">
                    <?php get_template_part('./partials/partials-events-top-card', 'top-card'); ?>
                </div>
            </section>
			<!-- /article -->

        <?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
