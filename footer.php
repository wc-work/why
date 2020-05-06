<?php
			/*
			* Bootstrap Modal
			 */
			?>
			
			<!-- footer -->
			<footer class="footer" role="contentinfo">
			
				<div class="container-fluid footer-align">
					<div class="row icon-width">
						<?php 
							// Check if Social Media Icons section of footer has data
							if ( have_rows('social_media_icons', 'option') ): 
								while ( have_rows('social_media_icons', 'option') ) : the_row(); 
						?>
							<a href="<?php echo get_sub_field('link')['url']; ?>"><img class="social" src="<?php echo get_sub_field('icon')['url']; ?>" alt="<?php echo get_sub_field('icon')['alt']; ?>"></a>
						<?php 
						endwhile;
						endif;
						wp_reset_postdata();?>	
					</div>
					<div class="row footer-info">
						<div class="center pb-3">
						<?php 
							// Check if Contact Info section of footer has data
						if ( have_rows('contact_info', 'option') ): while ( have_rows('contact_info', 'option') ) : the_row(); ?>
							<h2><?php echo get_sub_field('contact_headline'); ?></h2>
						</div>	
						<div class="center">
							<h2><?php echo get_sub_field('street_address'); ?></h2>
						</div>	
						<div class="center">
							<h2><?php echo get_sub_field('city_state_zip'); ?></h2>
						</div>	
						<div class="center">
							<h2><?php echo get_sub_field('phone_number'); ?></h2>
						</div>
						<?php if(get_field('email')): ?>
							<div class="center">
								<h2><?php echo get_sub_field('email'); ?></h2>
							</div>
						<?php endif; ?>
					</div>
					<?php 
								endwhile;
								endif;
								wp_reset_postdata();
							?>
					<div class="row copyright">
						<div class="center">
							<a href="<?php echo get_field('terms_and_conditions', 'option')['url']; ?>"><p><?php echo get_field('terms_and_conditions', 'option')['title']; ?></p></a>
						</div>
						<div class="center">
							<a class="center" href="<?php echo get_field('privacy_policy', 'option')['url']; ?>"><p><?php echo get_field('privacy_policy', 'option')['title']; ?></p></a>
						</div>
						<div class="center">
							<p class="center" >&copy; <?php echo date('Y'); ?> All Rights Reserved.</p>
						</div>
					</div>
					<!-- /copyright -->
				</div>
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
