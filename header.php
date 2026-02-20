<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<meta property="og:title" content="<?php bloginfo('title'); ?>" />
		<meta property="og:type" content="website" />
		<?php if ( get_field( 'open_graph_image', 'option' ) ) : ?>
			<meta property="og:image" content="<?php echo get_field( 'open_graph_image', 'option' ); ?>" />
		<?php endif ?>
		<meta property="og:url" content="<?php echo get_field( 'open_graph_url', 'option' ); ?>" />
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />

		<style>
			/* Alpine Styles */
			[x-cloak] {
				display: none !important;
			}
			.scroll-buttons {
					position: fixed;
					bottom: 20px;
					left: 20px;
					display: none;
					z-index: 20; /* Increased z-index */
			}

			.scroll-buttons button {
					color: #fff;
					border: none;
					border-radius: 50%;
					padding: 10px;
					cursor: pointer;
			}
		</style>

		<?php wp_head(); ?>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
		<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

	</head>
	<body <?php body_class(); ?> 
		x-cloak 
		x-data="{ loaded: true }" 
		x-show="loaded"
		x-ref="body">
		<div class="scroll-buttons">
			<button class="back-to-top bg-dark hover:bg-main-vivid fill-white hover:fill-dark duration-300 transition-colors" title="Back to top" aria-label="Back to top">
			<span class="flex items-center justify-center w-4 h-4 lg:w-6 lg:h-6">
				<svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" width="36" height="36" class="fill-inherit">
					<path d="m9.001 10.978h-3.251c-.412 0-.75-.335-.75-.752 0-.188.071-.375.206-.518 1.685-1.775 4.692-4.945 6.069-6.396.189-.2.452-.312.725-.312.274 0 .536.112.725.312 1.377 1.451 4.385 4.621 6.068 6.396.136.143.207.33.207.518 0 .417-.337.752-.75.752h-3.251v9.02c0 .531-.47 1.002-1 1.002h-3.998c-.53 0-1-.471-1-1.002zm7.506-1.5-4.507-4.751-4.507 4.751h3.008v10.022h2.998v-10.022z" fill-rule="nonzero"/>
				</svg>
			</span>
			</button>
		</div>
		<?php if ( ! function_exists( 'wp_body_open' ) ) {
			function wp_body_open() {
				do_action( 'wp_body_open' );
			}
		} ?>
		
		<header class="bg-transparent sticky top-0 z-20 shadow-md" role="banner" x-cloak x-data="{ menu_loaded: true }" x-show="menu_loaded">
			<?php require get_template_directory() . "/theme-parts/navigation.php"; // load-brand.php above inject the brand's logo from the theme's settings in the backend. ?> 				
		</header>