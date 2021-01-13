<?php get_header(); ?>
<?php the_content(); ?>
<div class="slider-container">
<img src="<?php echo get_template_directory_uri(); ?>/build/images/prev.svg" id="prev" />
<section class="post-slider">
<?php
$args = array(
    'post_ type' => 'post',
    'posts_per_page'=>-1,
    'post_status'=>'publish'
);
global $post;
$q = new WP_Query($args);
while($q->have_posts()): $q->the_post();
?>
<article class="post-slide feather">
<h2><?php echo substr(get_the_title(),0,30)."..."; ?></h2>
<p><strong><?php echo get_the_date(); ?></strong><?php the_excerpt(); ?></p>
<div class="modal">
    <?php the_post_thumbnail(); ?>
    <div class="wrap">
        <?php echo get_the_content(); ?>
    </div>
</div>
</article>
<?php endwhile; ?>
</section>
<img src="<?php echo get_template_directory_uri(); ?>/build/images/next.svg" id="next" />
</div>
<div class="wp-block-spacer" style="height:100px;"></div>
<?php get_footer(); ?>
