<?php $image = get_field('add_photo'); 
?>

<div class="my-4 col-xs-12 col-md-6 col-lg-3 d-flex justify-content-center">
    <?php if( !empty($image)): ?>
    <a href="<?php the_permalink(); ?>"><div class="card card-past-event" style="background-image: url('<?php echo esc_url($image['url']); ?>');"  alt="<?php echo esc_attr($image['alt']); ?>">

    <?php endif; ?>
        <div class="card-body card-past-body">
            <h2 class="link"><?php the_title(); ?></h2>
            <h4 class="link"><?php echo $eventDate->format('n/j/Y'); ?></h4>
        </div>
    </div></a>
</div> 