<div class="my-4 col-xs-12 col-md-6 col-lg-4 d-flex justify-content-center">
    <div class="card card-event">
        <?php if( get_field('add_photo')): ?>
            <img class="card-img-top card-img-event" src="<?php echo get_field('add_photo')['url'] ?>" alt="picture">
        <?php endif; ?>
        <div class="card-body">
            <h2>Card title</h2>
            <h4>March 3 / 10:00 am</h4>
            <h5>Heaton Elementary</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat rerum aspernatur assumenda quam repellendus inventore dolorum? Ea amet molestiae nobis. Sed nobis facere odit cupiditate, incidunt eveniet laudantium quia corrupti.</p>
        </div>
    </div>
</div>