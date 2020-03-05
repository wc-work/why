<?php $image = get_field('add_photo') ?>

<div class="my-4 col-xs-12 col-md-6 col-lg-3 d-flex justify-content-center">
    <?php if( !empty($image)): ?>
    <div class="card card-past-event" style="background-image: url('<?php echo esc_url($image['url']); ?>');"  alt="<?php echo esc_attr($image['alt']); ?>">

    <?php endif; ?>
        <div class="card-body">
            <h2><?php echo get_field('event_title') ?></h2>
            <h4><?php echo get_field('event_date') ?></h4>
        </div>
    </div>
</div>