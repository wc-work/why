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
            <article class="container my-5">
				<div class="row pt-4 d-flex justify-content-around">
					<div class="cssmenu small">
						<ul>
							<?php if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part('./partials/partials-accordion', 'accordion-section'); ?>
							<?php endwhile; 
							wp_reset_postdata();
							endif; ?>	
							
						</ul>
					</div>
					<div class="cssmenu full col">
						<ul>
							<?php if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part('./partials/partials-resource-link-card', 'link-card-section'); ?>
							<?php endwhile; 
							wp_reset_postdata();
							endif; ?>	
						</ul>
					</div>
					<div class="cssmenu full col">
						<ul>
							<?php if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part('./partials/partials-resource-document-card', 'document-card-section'); ?>
							<?php endwhile; 
							wp_reset_postdata();
							endif; ?>
						</ul>
					</div>
					<div class="cssmenu full col">
						<ul>
							<?php if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part('./partials/partials-resource-brochure-card', 'brochure-card-section'); ?>
							<?php endwhile; 
							wp_reset_postdata();
							endif; ?>
						</ul>
					</div>
				</div>
			</article>
			<!-- Accordion -->
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>