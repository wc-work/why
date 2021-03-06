<?php
/*
Template Name: Resources-Page
Template Post Type: page
*/

get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section>

		
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <!-- banner -->
            <?php get_template_part('./partials/partials-banner', 'banner-section'); ?>
			<!-- /banner -->
		<?php endwhile; 
			wp_reset_postdata();
		endif; ?>

            
            <article class="container-fluid my-5 px-5">
				<div class="row d-flex justify-content-around">
					<!-- accordion single-->
					<div class="cssmenu small">
						<ul>
							<?php if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part('./partials/partials-accordion', 'accordion-section'); ?>
							<?php endwhile; 
							wp_reset_postdata();
							endif; ?>	
							
						</ul>
					</div>
					<!-- /accordion single-->
					<!-- accordions triple-->
					<div class="cssmenu full col">
						<?php if(get_field('image_1')): 
							else: ?>
						<i class="fas fa-4x fa-link pb-5"></i>
						<?php endif; ?>
						<ul>
							<?php if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part('./partials/partials-resource-link-card', 'link-card-section'); ?>
							<?php endwhile; 
							wp_reset_postdata();
							endif; ?>	
						</ul>
					</div>
					<div class="cssmenu full col">
						<?php if(get_field('image_2')): 
							else: ?>
						<i class="far fa-4x fa-file-alt pb-5"></i>
						<?php endif; ?>
						<ul>
							<?php if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part('./partials/partials-resource-document-card', 'document-card-section'); ?>
							<?php endwhile; 
							wp_reset_postdata();
							endif; ?>
						</ul>
					</div>
					<div class="cssmenu full col">
						<?php if(get_field('image_3')): 
							else: ?>
						<i class="far fa-4x fa-file-pdf pb-5"></i>
						<?php endif; ?>
						<ul>
							<?php if(have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part('./partials/partials-resource-brochure-card', 'brochure-card-section'); ?>
							<?php endwhile; 
							wp_reset_postdata();
							endif; ?>
						</ul>
					</div>
					<!-- /accordions triple-->
				</div>
			</article>
			<div class="space"></div>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>