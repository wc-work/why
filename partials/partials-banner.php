<section>
	<div class="banner darken-photo"
		style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
		<h1><?php echo get_the_title(); ?></h1>
		<p><?php the_content(); ?></p>
	</div>
</section>
