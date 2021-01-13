<?php get_header(); ?>

<main role="main" aria-label="Content">
    <!-- section -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
            $id = get_the_ID();
            $terms = wp_get_post_terms($id, 'project_categories');
            if (isset($terms[0]) && $terms[0]->slug == 'development-systems') :
            ?>
                <!-- article -->
                <section class="development-card">
                    <div class="wp-block-spacer" style="height: 30px;"></div>
                    <h1 class="text-center"><?php the_title(); ?></h1>
                    <div class="wp-block-spacer" style="height: 15px;"></div>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('development-systems'); ?>>

                        <div class="wp-block-columns board-diagram">
                            <div class="wp-block-column" style="flex-basis:33.33333%">
                                <?php if (get_field('board')) : ?>
                                    <div class="feather">
                                        <div class="no-modal">
                                            <img src="<?php echo get_template_directory_uri() . "/build/images/board.svg"; ?>" />
                                            <h4>View Board</h4>
                                        </div>
                                        <div class="modal">
                                            <img id="board" src="<?php the_field('board'); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="wp-block-spacer" style="height:30px;"></div>
                                <?php if (get_field('diagram')) : ?>
                                    <div class="feather">
                                        <div class="no-modal">
                                            <img src="<?php echo get_template_directory_uri() . "/build/images/diagram.svg"; ?>" />
                                            <h4>View Diagram</h4>
                                        </div>
                                        <div class="modal">
                                            <img id="diagram" src="<?php the_field('diagram'); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="wp-block-column" style="flex-basis:66.66666%">
                                <?php the_content(); ?>
                                <div class="wp-block-spacer" style="height:60px;"></div>
                                <?php $id = get_the_ID(); ?>
                                <div class="buttons">
                                    <?php $id = get_the_ID(); ?>
                                    <div class="button-wrap">
                                        <?php if (get_field('download')) : ?>
                                            <a target="_blank" href="<?php the_field('download'); ?>">Download Latest Release</a>
                                        <?php endif; ?>
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
                                            <a target="_blank" href="<?php the_field('support'); ?>">Support</a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="button-wrap">

                                        <?php if (get_field('docs')) : ?>
                                            <a target="_blank" href="<?php the_field('docs'); ?>">Documentation</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="wp-block-spacer" style="height: 100px;"></div>
                        <?php else : ?>
                            <div class="wp-block-spacer" style="height: 70px;"></div>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <section class="full-1140">


                                    <?php the_content(); ?>
                                    <div class="wp-block-columns">
                                        <div class="wp-block-column" style="flex-basis:33%;">
                                        </div>
                                        <div class="wp-block-column" style="flex-basis:66%;">
                                            <?php $id = get_the_ID(); ?>
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
                                    <?php endif; ?>



                                    <?php edit_post_link(); ?>

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