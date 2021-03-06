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
	if (!empty($children)) :
		get_template_part('content', 'top');
	else :
	?>

		<!-- section -->
		<div class="wp-block-spacer" style="height:70px;"></div>
		<h1 class="full-1140 text-center"><?php echo $title; ?></h1>
		<div class="wp-block-spacer" style="height:30px;"></div>
		<section class="cards">


			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class($feather . ' project-card'); ?> data-url="<?php echo get_the_permalink(); ?>">
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
						</div>
						<div class="modal">
							<?php echo get_the_content(); ?>
							<div class="end">
								<a href="<?php the_permalink(); ?>">Link this project</a>
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