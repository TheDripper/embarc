<?php get_header(); ?>

<main role="main" aria-label="Content">
    <!-- section -->
    <div class="wp-block-spacer" style="height: 50px;"></div>
    <h1 class="center mt-0">News Archive</h1>
    <section class="cards news" data-masonry='{"itemSelector": ".project-card", "column-width":"300"}'>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class('feather project-card'); ?>>
                    <div class="date">
                        <h6>Posted: <strong><?php echo get_the_date('m/d/Y'); ?></strong></h6>
                    </div>
                    <h1 style="background:<?php echo $color; ?>"><?php the_title(); ?></h1>
                    <div class="copy">
                        <?php the_post_thumbnail(); ?>
                        <?php echo get_the_excerpt(); ?>
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
                                <a href="<?php the_field('repository'); ?>">Source Repository</a>
                            <?php endif; ?>
                        </div>
                        <div class="button-wrap">

                            <?php if (get_field('support')) : ?>
                                <a target="_blank" href="<?php the_field('support'); ?>">Support</a>
                            <?php endif; ?>
                        </div>
                        <div class="button-wrap">

                            <?php if (get_field('docs')) : ?>
                                <a target="_blank" href="<?php the_field('docs'); ?>">Documentation</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="modal">
                        <?php echo get_the_content(); ?>
                        <a href="<?php the_permalink(); ?>">Link this article</a>
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