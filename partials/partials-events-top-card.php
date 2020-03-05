<?php $image = get_field('add_photo') ?>

<div class="my-4 col-xs-12 col-md-6 col-lg-4 d-flex justify-content-center">
    <div class="card card-event">
        <?php if( !empty($image)): ?>
            <img class="card-img-top card-img-event" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
        <?php endif; ?>
        <div class="card-body">
            <h2><?php echo get_field('event_title') ?></h2>
            <h4><?php echo get_field('event_date') ?></h4>
            <a href="<?php echo get_field('location_link') ?>"><h5><?php echo get_field('event_location') ?></h5></a>
            <p class="card-text"><?php echo get_field('event_location') ?></p>
        </div>
    </div>
</div>