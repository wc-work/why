
<?php 
$images = get_field('gallery');
if( $images ): ?>

	<ul class="row p-0">
		<?php foreach( $images as $image ): ?>
		<li class="list-photo my-4 col-xs-12 col-md-6 col-lg-3">
			<a href="<?php echo esc_url($image['url']); ?>">
				<img class="img-fluid" src="<?php echo esc_url($image['sizes']['medium']); ?>"
					alt="<?php echo esc_attr($image['alt']); ?>" />
			</a>
			<p><?php echo esc_html($image['caption']); ?></p>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
