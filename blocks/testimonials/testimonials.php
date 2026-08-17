<?php
/**
 * Block template file: testimonials.php
 *
 * Testimonials Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-testimonials';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// Set variables
	$heading = get_field( 'heading' );
	$colour_scheme = get_field( 'block_settings_block_colour_settings' );
	$background_colour = '';
	$heading_colour = 'text-dark';
	$text_colour = 'text-dark';
	$border_colour = 'border-dark';
	$button_style = '';
	// Set the colour scheme
	switch ($colour_scheme) {
		case 'off-white':
			$background_colour = 'bg-off-white';
			$heading_colour = 'text-dark';
			break;
		case 'main':
			$background_colour = 'bg-main';
			$heading_colour = 'text-dark';
			break;
		case 'secondary':
			$background_colour = 'bg-secondary';
			$heading_colour = 'text-dark';
			break;
		case 'tertiary':
			$background_colour = 'bg-tertiary';
			$heading_colour = 'text-dark';
			break;
		case 'quaternary':
			$background_colour = 'bg-quaternary';
			$heading_colour = 'text-dark';
			break;
		case 'dark':
			$background_colour = 'bg-dark';
			$heading_colour = 'text-white';
			$button_style = 'alt';
			break;
		case 'warm':
			$background_colour = 'bg-warm';
			$heading_colour = 'text-dark';
			$text_colour = 'text-warm-text';
			$border_colour = 'border-warm-text';
			$button_style = '';
			break;
		case 'white':
			$background_colour = 'bg-white';
			$heading_colour = 'text-dark';
			break;
		default:
			$background_colour = 'bg-white';
			break;
	}

	// Get the page colour
	$current_page_id = get_the_ID();
	$page_colour_check = get_field( 'page_colour_block_colour_settings', $current_page_id ); 
	$icon_colour = 'fill-dark';
	if( $page_colour_check ):
		$page_colour = 'bg-' . $page_colour_check; 
	endif;

	// Set the text colour
	if($page_colour_check === 'dark') {
		$text_colour = 'text-white';
		$border_colour = 'border-white';
	}

	if($page_colour === $background_colour && $page_colour_check === 'dark') {
		$icon_colour = 'fill-white';
	}

	// loop through testimonials
	$args = array(
			'post_type' => 'testimonial',
			'posts_per_page' => 3,
			'meta_query' => array(
					array(
							'key'     => 'featured', 
							'value'   => '1',
							'compare' => '=' 
					)
			)
	);
	// set the query
	$testimonials_query = new WP_Query( $args );

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 <?php echo $background_colour;?>">
		
	<div class="container flex flex-col justify-center items-center px-8 mx-auto relative xl:px-[10%] py-12 lg:py-36 2xl:py-44">

		<h1 class="font-medium text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight max-md:self-start <?php echo $heading_colour;?>"><?php echo $heading; ?></h1>
		<div class="w-full flex justify-center mt-6 lg:mt-16 2xl:mt-24">

			<?php
				if ( $testimonials_query->have_posts() ) : ?>
					<div class="grid grid-cols-1 md:grid-cols-3 max-md:gap-y-8 lg:gap-x-6">
					<?php while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>
					
						
						<?php
							// Get the post ID
							$post_data = get_the_ID();
							// Get the associated client
							// $associated_client = get_field( 'associated_client', $post_data ); 
						?>
							<?//php if ( $associated_client ) : ?>
								<?//php foreach ( $associated_client as $post_ids ) : ?>

									<?php $testimonial_author = get_field( 'author', $post_data ); ?>
									<?php $testimonial_text = get_field( 'testimonial', $post_data ); ?>
									<?php $featured_status = get_field( 'featured', $post_data ); ?>
									<?php $featured_img = get_the_post_thumbnail('full', array( 'class' => 'w-full aspect-square object-contain' ) ); ?>

									<div class="col-span-1 relative p-10 lg:p-12 <?php echo $page_colour; ?>">

										<div class="flex w-32 h-32 mb-4 lg:mb-6 <?php echo $background_colour;?> p-4">
											<svg class="<?php echo $icon_colour;?>" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 24 24">
												<path d="M15.8,18.8c-2.4-.6-5.2-2-4.1-4.1,3.3-6.3.9-9.7-2.6-9.7s-6,3.5-2.6,9.7c1.1,2.1-1.7,3.5-4.1,4.1C0,19.3,0,20.4,0,22.3v.7h18v-.7c0-1.9,0-3-2.2-3.5ZM14.2,11c.4-.9.8-2.1.8-2.9-.5-.7-.8-1.6-.8-2.6,0-2.6,2.3-4.5,4.9-4.5s4.9,1.9,4.9,4.5-2.8,5.3-6.5,4.3c-.7.5-2.2.9-3.3,1.2ZM18.4,4.6l-1.6.2,1.2,1.1-.3,1.6,1.4-.8,1.4.8-.3-1.6,1.2-1.1-1.6-.2-.7-1.4s-.7,1.4-.7,1.4Z"/>
											</svg>
									</div>
											

											<div class="flex flex-col gap-y-2">
												<h2 class="font-medium text-lg lg:text-xl 2xl:text-2xl lg:leading-tight <?php echo $text_colour;?>"><?php echo get_the_title( ); ?><h2>
												<hr class="min-w-full w-fit lg:min-w-[65%] my-4 lg:my-6 border-2 border-solid <?php echo $border_colour;?>" aria-hidden="true" role="presentation" />
												<p class="font-medium leading-relaxed text-base <?php echo $text_colour;?>">"<?php echo $testimonial_text; ?>" – <span class="font-semibold"><?php echo $testimonial_author; ?></span></p>
											</div>
										
								</div>

								<?//php endforeach; ?>
							<?//php endif; ?>

					<?php endwhile; ?>
					</div>
				<?php else :
						echo 'No testimonials found.';
				endif;

				wp_reset_postdata();
			?>

		</div>
		
		<?php $button = get_field( 'button' ); ?>
		<?php if ( $button ) : ?>
			<div class="w-fit max-md:self-start mt-8 lg:mt-16 2xl:mt-24">
				<a class="btn <?php echo $button_style; ?>" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
					<?php echo esc_html( $button['title'] ); ?>
				</a>
			</div>
		<?php endif; ?>

	</div>

</section>