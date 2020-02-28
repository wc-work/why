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
                    <div class="my-4 col-xs-12 col-md-6 col-lg-4 d-flex justify-content-center">
                        <div class="card card-event">
                            <img class="card-img-top card-img-event" src="https://static.scientificamerican.com/blogs/cache/file/7069F0BB-A9AB-4932-84F508BBC0136458_source.jpg?w=590&h=800&F754D658-CE37-41EE-BE2C0EFC7134D582" alt="Card image cap">
                            <div class="card-body">
                                <h2>Card title</h2>
                                <h4>March 3 / 10:00 am</h4>
                                <h5>Heaton Elementary</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat rerum aspernatur assumenda quam repellendus inventore dolorum? Ea amet molestiae nobis. Sed nobis facere odit cupiditate, incidunt eveniet laudantium quia corrupti.</p>
                            </div>
                        </div>
                    </div>
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
