<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
	<link href="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" type="text/css" rel="stylesheet" />
	<?php wp_head(); ?>
</head>
<?php 
	$cats = get_terms('project_categories');
	$colors = [];
	foreach($cats as $cat) {
		$color = get_field('category_color',$cat);
		$slug = $cat->slug;
		if(isset($color)) {
			$colors[$slug] = $color; 
		}
	}
?>
<body <?php body_class(); ?> data-colors='<?php echo json_encode($colors); ?>'>
<div class="logo-wrap between full-1140 p-30">
	<img src="<?php echo get_template_directory_uri()."/build/images/embarc-logo.png"?>"
	<h6>Your ARC-based open source project directory | currently tracking:  27 github projects</h6>
</div>
<div class="full-1400">
	<?php wp_nav_menu(array('theme_location'=>'primary-navigation')); ?>
</div>