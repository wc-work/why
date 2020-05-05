<section>
<?php 
  $parent_post_id = wp_get_post_parent_id($post);
  $parent_post = get_post($parent_post_id);
  $parent_post_title = $parent_post->post_title;
?>
  <div class="banner shade-photo" style="background-image: url(<?php echo get_the_post_thumbnail_url($parent_post_id); ?>);">
    <h1><?php echo $parent_post_title; ?></h1>
    <div class="banner-overlay" style="background-color: <?php the_field('banner_color') ?>;"></div>
  </div>
</section>
