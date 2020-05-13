<?php $image = get_field('add_photo'); 
      $eventDate = new DateTime(get_field('event_date'));
?>

<div class="my-4 col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center">
    <div class="card card-event">
        <?php if( !empty($image)): ?>
            <img class="card-img-top card-img-event" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" src="<?php echo esc_url($image['url']); ?>">
        <?php endif; ?>
        <div class="card-body">
            <h2><?php the_title(); ?></h2>
            <h3><?php echo $eventDate->format('n/j/Y'); ?></h3>
            <a target="_blank" href="<?php echo get_field('location_link') ?>"><h4><?php echo get_field('event_location') ?></h4></a>
            <p class="card-text"><?php echo get_field('description') ?></p>
        </div>
    </div>
</div>