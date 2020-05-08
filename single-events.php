<?php get_header(); ?>

	<main class="main" role="main">
	<!-- section -->
	<section>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <!-- banner -->
            <?php get_template_part('./partials/partials-banner', 'banner-section'); ?>
			<!-- /banner -->
		<?php endwhile; 
			wp_reset_postdata();
		endif; ?>

		<!-- article -->
		<article class="container">
			<!-- post title -->
			<h1 class="gallery-title pt-4">The Gallery</h1>
			<!-- /post title -->

			<!-- post gallery -->
			<?php if (have_posts()): 
				while (have_posts()) : the_post(); ?>
					<?php the_content();
			 	endwhile; 
				wp_reset_postdata();
			endif; ?>
			<!-- /post gallery -->

		</article>
		<!-- /article -->
		<div class="space"></div>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
