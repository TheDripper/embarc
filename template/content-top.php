<div class="full-1140 top-cat">
    <?php
    $term = get_queried_object();
    $color = get_field('category_color', $term);
    // $children = get_term_children($term->term_id, 'project_categories');
    $children = get_terms('project_categories', array(
        'parent' => $term->term_id
    ));
    $title = $term->name;
    $hilight = 0;
    $project = $_GET['id'];

    if (empty($children)) {
        $hilight = $term->slug;
        $term = get_term($term->parent, 'project_categories');
        $color = get_field('category_color', $term);
        $children = get_term_children($term->term_id, 'project_categories');
        $children = get_terms('project_categories', array(
            'parent' => $term->term_id
        ));
    }
    ?>
    <div class="wp-block-spacer" style="height:70px;"></div>
    <h1 class="text-center mt-0"><?php echo $title; ?></h1>
    <div class="wp-block-spacer" style="height:30px;"></div>
    <?php foreach ($children as $child) : ?>
        <?php $term = get_term($child); ?>
        <?php
        $open = '';
        if ($hilight == $term->slug) {
            $open = 'open';
        }
        ?>
        <?php $mage = get_field('image', $term); ?>
        <div id="<?php echo $term->slug; ?>" class="cat-drop <?php echo $open; ?>">
            <div class="color-bar" style="background:<?php echo $color; ?>;" class="<?php echo $open; ?>"></div>
            <div class="grey-bar <?php echo $open; ?>" style="background:#666666;"></div>
            <div class="title-wrap">
                <img src="<?php echo $mage; ?>" />
                <h3><?php echo $term->name; ?></h3>
            </div>
            <div class="date-wrap">
                <p>Updated: <?php echo get_the_date(); ?></p>
                <img src="/wp-content/themes/template/build/images/cat-right.svg" class="cat-right" />
            </div>
        </div>
        <section class="cards drop <?php echo $open; ?>">
            <?php
            $args = array(
                'post_type' => 'project', // if you want to further filter by post_type
                'tax_query' => array(
                    array(
                        'taxonomy' => 'project_categories',
                        'field' => 'term_id',
                        'terms' => $child->term_id // you need to know the term_id of your term "example 1"
                    )
                )
            );
            global $post;
            $q = new WP_Query($args);
            while ($q->have_posts()) : $q->the_post(); ?>
                <?php
                $feather = 'feather';
                $nomodals = [
                    242,
                    129,
                    127,
                    33
                ];
                $active = '';
                $id = get_the_ID();
                if ($id == $project) {
                    $active = 'active ';
                }
                if (strlen(get_the_content()) < 600 || in_array($id, $nomodals)) {
                    $feather = '';
                }
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class($active . $feather . ' project-card'); ?>>
                    <div class="date">
                        <h6>Location: <strong>Github</strong></h6>
                        <h6>Updated: <strong><?php echo get_the_date('m/d/Y'); ?></strong></h6>
                    </div>
                    <h1 style="background:<?php echo $color; ?>"><?php the_title(); ?></h1>
                    <div class="copy">
                        <?php if (strlen(get_the_content()) > 600) : ?>
                            <div class="nomodal">
                                <p><?php echo get_the_excerpt(); ?></p>
                            </div>
                            <div class="modal">
                                <?php echo get_the_content(); ?>
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
                                            <a target="_blank" href="<?php the_field('download'); ?>"><?php echo $download; ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="button-wrap">
                                        <?php if (get_field('repository')) : ?>
                                            <a href="<?php the_field('repository'); ?>">Source Repository</a>
                                        <?php endif; ?>
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
                                <div class="end">
                                    <a href="<?php the_permalink(); ?>">Link this project</a>
                                </div>
                            </div>
                        <?php else : ?>
                            <?php echo get_the_content(); ?>
                        <?php endif; ?>
                        <?php if (in_array($id, $nomodals)) : ?>
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
                                <a href="<?php the_field('repository'); ?>"><?php echo $repository; ?></a>
                            <?php endif; ?>
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
                </article>
            <?php endwhile; ?>
        </section>
    <?php endforeach; ?>
</div>
<div class="wp-block-spacer" style="height:100px;"></div>