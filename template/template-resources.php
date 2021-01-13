<?php // Template Name: Resources 
?>
<?php get_header(); ?>
<div class="wp-block-spacer" style="height:70px;"></div>
<main role="main" aria-label="Content">
    <!-- section -->
    <h1 class="text-center mt-0"><?php the_title(); ?></h1>
    <section class="cards">
        <?php
        $args = array(
            'post_type' => 'page',
            'posts_per_page' => -1,
            'post_parent' => 294
        );
        $q = new WP_Query($args);
        $color = '#976CB2';
        ?>
        <?php if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); ?>

                <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(' project-card'); ?> data-url="<?php echo get_the_permalink(); ?>">
                    <div class="date">
                    </div>
                    <h1 style="background:<?php echo $color; ?>"><?php the_title(); ?></h1>
                    <div class="copy">
                        <?php if (get_the_ID() == 53) : ?>
                            <p>Catch up on the latest announcements and stories from embarc.</p>
                        <?php endif; ?>
                        <?php echo get_the_excerpt(); ?>
                        <div class="modal">
                            <?php echo get_the_content(); ?>
                            <div class="end">
                                <a href="<?php the_permalink(); ?>">Link this project</a>
                            </div>
                        </div>
                        <?php if (get_field('external_link')) : ?>
                            <a class="brick" href="<?php the_field('external_link'); ?>"></a>
                        <?php else : ?>
                            <a class="brick" href="<?php the_permalink(); ?>"></a>
                        <?php endif; ?>
                    </div>
                    <div class="buttons">
                        <?php $id = get_the_ID(); ?>
                        <div class="button-wrap">
                            <?php if (get_field('download')) : ?>
                                <a target="_blank" href="<?php the_field('download'); ?>">Download Latest Release</a>
                            <?php endif; ?>
                        </div>
                        <div class="button-wrap">
                            <?php if (get_field('repository')) : ?>
                                <a href="<?php the_field('repository'); ?>">Repository</a>
                            <?php endif; ?>
                        </div>
                        <div class="button-wrap">

                            <?php if (get_field('support')) : ?>
                                <a target="_blank" href="<?php the_field('support'); ?>">Support</a>
                            <?php endif; ?>
                        </div>
                        <div class="button-wrap">

                            <?php if (get_field('docs')) : ?>
                                <a target="_blank" href="<?php the_field('docs'); ?>">Docs</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    </div>

                </article>
                <!-- /article -->

            <?php endwhile; ?>

        <?php else : ?>

            <!-- article -->
            <article>

                <h2><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h2>

            </article>
            <!-- /article -->

        <?php endif; ?>

    </section>
    <!-- /section -->
</main>
<?php get_footer(); ?>