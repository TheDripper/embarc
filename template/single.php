<?php get_header(); ?>

<main role="main" aria-label="Content">
	<!-- section -->
	<div class="wp-block-spacer" style="height: 70px;"></div>
	<section class="full-1140">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php the_content(); ?>
					<div class="wp-block-columns">
						<div class="wp-block-column" style="flex-basis:33%;">
						</div>
						<div class="wp-block-column" style="flex-basis:66%;">
							<?php $id = get_the_ID(); ?>
							<ul>
								<?php if (get_field('download')) : ?>
									<p><a target="_blank" href="<?php the_field('download'); ?>">Download</a></p>
								<?php endif; ?>
								<?php if (get_field('repository')) : ?>
									<p><a href="<?php the_field('repository'); ?>">Repository</a></p>
								<?php endif; ?>
								<?php if (get_field('support')) : ?>
									<p><a target="_blank" href="<?php the_field('support'); ?>">Support</a></p>
								<?php endif; ?>

								<?php if (get_field('docs')) : ?>
									<p><a target="_blank" href="<?php the_field('docs'); ?>">Docs</a></p>
								<?php endif; ?>
							</ul>
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