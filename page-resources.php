<?php
/*
Template Name: Resources
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
		<?php endwhile; 
			wp_reset_postdata();
		endif; ?>

            <!-- Accordion-->
            <article class="container">
				<div class="row">
					<div class="col pt-4 d-flex justify-content-center">
						<div class="cssmenu">
							<ul>
								<?php if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
									<?php get_template_part('./partials/partials-accordion', 'accordion-section'); ?>
								<?php endwhile; 
								wp_reset_postdata();
								endif; ?>	
								<li class="active has-sub">
									<h5>Documents</h5>
									<ul>
										<a href="#">
										<li>
											<img src="#" alt="#">
											<h5>Link to a resource</h5>
										</li>
										</a>
									</ul>
								</li>
								<li class="active has-sub">
									<h5>Brochures</h5>
									<ul>
										<a href="#">
										<li>
											<img src="#" alt="#">
											<h5>Link to a resource</h5>
										</li>
										</a>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>	
				
			</article>
			<!-- Accordion -->
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>