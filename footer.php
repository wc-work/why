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
						if ( have_rows('social_media_icons') ): 
							while ( have_rows('social_media_icons') ) : the_row(); 
						?>
							<a href="#"><img src="<?php echo get_sub_field('icon')['url']; ?>" alt=""></a>
						<?php 
						endwhile;
						endif;
						wp_reset_postdata();?>					
					</div>
			
					<div class="row footer-info">
						<div class="center">
							<?php 
							// Check if Contact Info section of footer has data
							if ( have_rows('contact_info') ): while ( have_rows('contact_info') ) : the_row(); ?>
								<h1><?php echo get_sub_field('contact_headline'); ?></h1>
							
						
								<h2>7775 N Palm Ave Suite</h2>
						</div>	
						<div class="center">
								<h2>Fresno, CA 93711</h2>
							
								<h2>559-225-2665</h2>
						</div>
					</div>
					<?php 
						endwhile;
						endif;
						wp_reset_postdata();
					?>
					<div class="row copyright">
						&copy; <?php echo date('Y'); ?> All Rights Reserved.
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
