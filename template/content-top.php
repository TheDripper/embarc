<div class="full-1140 top-cat">
    <?php
    $term = get_queried_object();
    $color = get_field('category_color', $term);
    $children = get_term_children($term->term_id, 'project_categories');
    ?>
    <?php foreach ($children as $child) : ?>
        <?php $term = get_term($child); ?>
        <?php $mage = get_field('image', $term); ?>
        <div class="cat-drop">
            <div class="color-bar" style="background:<?php echo $color; ?>;"></div>
            <div class="grey-bar" style="background:#666666;"></div>
            <img src="<?php echo $mage; ?>" />
            <h3><?php echo $term->name; ?></h3>
        </div>
        <section class="cards drop">
            <?php
            $args = array(
                'post_type' => 'project', // if you want to further filter by post_type
                'tax_query' => array(
                    array(
                        'taxonomy' => 'project_categories',
                        'field' => 'term_id',
                        'terms' => $child // you need to know the term_id of your term "example 1"
                    )
                )
            );
            global $post;
            $q = new WP_Query($args);
            while ($q->have_posts()) : $q->the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('feather project-card'); ?>>
                    <div class="date">
                        <h6>Location: <strong>Github</strong></h6>
                        <h6>Updated: <strong><?php echo get_the_date('m/d/Y'); ?></strong></h6>
                    </div>
                    <h1 style="background:<?php echo $color; ?>"><?php the_title(); ?></h1>
                    <div class="copy">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                    <div class="buttons">
                        <?php $id = get_the_ID(); ?>
                        <div class="button-wrap">
                            <?php if (get_field('download')) : ?>
                                <a target="_blank" href="<?php the_field('download'); ?>">Download</a>
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
                    <div class="modal">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </section>
    <?php endforeach; ?>
</div>