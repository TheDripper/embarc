<?php get_header(); ?>

<main role="main" aria-label="Content">
  <!-- section -->
  <div class="news-cont">
    <section class="news" data-masonry='{"itemSelector": ".project-card", "column-width":"380"}'>


      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <!-- article -->
          <article id="post-<?php the_ID(); ?>" <?php post_class('feather project-card'); ?>>
            <div class="date">
              <h6>Posted: <strong><?php echo get_the_date('m/d/Y'); ?></strong></h6>
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
  </div>
  <div class="wp-block-spacer" style="height:100px;"></div>
  <!-- /section -->
</main>
<?php get_footer(); ?>