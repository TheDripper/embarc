<?php get_header(); ?>

<main role="main" aria-label="Content">
	<!-- section -->
	<section class="full-1140">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php the_content(); ?>
					<h1>TEST</h1>
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