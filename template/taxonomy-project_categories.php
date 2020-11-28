<?php 
		$term = get_queried_object();
		$color = get_field('category_color', $term);
		if(empty($color)) {
			$term = get_term($term->parent);
			$color = get_field('category_color', $term);
		} 
?>
<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section class="cards">

			
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="date">
			<h6>Location: <strong>Github</strong></h6>
			<h6>Updated: <strong><?php echo get_the_date('m/d/Y'); ?></strong></h6>
			</div>
			<h1 style="background:<?php echo $color; ?>"><?php the_title(); ?></h1>
			<div class="copy">
				<?php echo get_the_excerpt(); ?>
			</div>
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>