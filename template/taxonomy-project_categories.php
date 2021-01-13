<?php
$term = get_queried_object();
$children = get_term_children($term->term_id, 'project_categories');

$color = get_field('category_color', $term);
$title = $term->name;
$feather = 'feather';
if ($term->slug == 'development-systems') {
    $feather = 'system';
}

if (empty($color)) {
    $term = get_term($term->parent);
    $color = get_field('category_color', $term);
}
?>
<?php
if ($term->slug == 'resources') {
    wp_redirect('/resources', 301);
    exit();
}
?>
<?php get_header(); ?>
<main role="main" aria-label="Content">
    <?php
    // if (!empty($children)) :
    if ($term->term_id == 9) :
        get_template_part('content', 'top');
    else :
    ?>

        <!-- section -->
        <div class="wp-block-spacer" style="height:70px;"></div>
        <h1 class="full-1140 text-center mt-0"><?php echo $title; ?></h1>
        <div class="wp-block-spacer" style="height:30px;"></div>
        <section class="cards test">


            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!-- article -->
                    <?php
                    $feather = 'feather';
                    $nomodals = [
                        242,
                        129,
                        127,
                        33,
                        38
                    ];
                    $id = get_the_ID();
                    if (strlen(get_the_content()) < 600 || in_array($id, $nomodals) || $term->slug == "development-systems") {
                        $feather = '';
                    }
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class($feather . ' project-card'); ?> data-url="<?php echo get_the_permalink(); ?>">
                        <div class="date">
                            <h6>Location: <strong>Github</strong></h6>
                            <h6>Updated: <strong><?php echo get_the_date('m/d/Y'); ?></strong></h6>
                        </div>
                        <h1 style="background:<?php echo $color; ?>"><?php the_title(); ?></h1>
                        <div class="copy">
                            <?php if (strlen(get_the_content()) > 600) : ?>
                                <?php echo get_the_excerpt(); ?>
                                <div class="modal">
                                    <?php echo get_the_content(); ?>
                                    <div class="end">
                                        <a href="<?php the_permalink(); ?>">Link this project</a>
                                    </div>
                                </div>
                            <?php else : ?>
                                <?php echo get_the_content(); ?>
                            <?php endif; ?>
                            <?php if (in_array($id, $nomodals) || $term->slug == "development-systems") : ?>
                                <a class="brick" href="<?php the_permalink(); ?>"></a>
                            <?php endif; ?>
                        </div>
                        <div class="buttons">
                            <?php $id = get_the_ID(); ?>
                            <div class="button-wrap">
                                <?php if (get_field('download')) : ?>
                                    <?php
                                    $download = 'Download Latest Release';
                                    if (get_field('download_text_override')) {
                                        $download = get_field('download_text_override');
                                    }
                                    ?>
                                    <a target="_blank" href="<?php the_field('download'); ?>"><?php echo $download; ?></a> <?php endif; ?>
                            </div>
                            <div class="button-wrap">
                                <?php if (get_field('repository')) : ?>
                                    <?php
                                    $repository = 'Source Repository';
                                    if (get_field('repository_text_override')) {
                                        $repository = get_field('repository_text_override');
                                    }
                                    ?>
                                    <a href="<?php the_field('repository'); ?>"><?php echo $repository; ?></a> <?php endif; ?>
                            </div>
                            <div class="button-wrap">

                                <?php if (get_field('support')) : ?>
                                    <?php
                                    $support = 'Support';
                                    if (get_field('support_text_override')) {
                                        $support = get_field('support_text_override');
                                    }
                                    ?>

                                    <a target="_blank" href="<?php the_field('support'); ?>"><?php echo $support; ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="button-wrap">

                                <?php if (get_field('docs')) : ?>
                                    <a target="_blank" href="<?php the_field('docs'); ?>">Documentation</a>
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
    <?php endif; ?>
</main>
<?php get_footer(); ?>