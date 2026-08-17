<?php
/**
 * Block template file: leadership.php
 *
 * Leadership Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'leaderships-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-leadership';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// Set variables
	$heading = get_field( 'heading' );
	$content = get_field( 'content' );
	$colour_scheme = get_field( 'block_settings_block_colour_settings' );
	$background_colour = '';
	$heading_colour = 'text-dark';
	$text_colour = 'text-dark';
	$button_style = '';
	$border_colour = 'border-dark';
	$icon_colour = 'fill-dark';
	// Set the colour scheme
	switch ($colour_scheme) {
		case 'off-white':
			$background_colour = 'bg-off-white';
			$heading_colour = 'text-dark';
			break;
		case 'main':
			$background_colour = 'bg-main';
			$background_colour_vivid = 'bg-main-vivid';
			$heading_colour = 'text-dark';
			break;
		case 'secondary':
			$background_colour = 'bg-secondary';
			$background_colour_vivid = 'bg-secondary-vivid';
			$heading_colour = 'text-dark';
			break;
		case 'tertiary':
			$background_colour = 'bg-tertiary';
			$background_colour_vivid = 'bg-tertiary-vivid';
			$heading_colour = 'text-dark';
			break;
		case 'quaternary':
			$background_colour = 'bg-quaternary';
			$background_colour_vivid = 'bg-quaternary-vivid';
			$heading_colour = 'text-dark';
			break;
		case 'dark':
			$background_colour = 'bg-dark';
			$background_colour_vivid = 'bg-dark-gray';
			$heading_colour = 'text-white';
			$text_colour = 'text-white';
			$button_style = 'alt';
			$border_colour = 'border-white';
			$icon_colour = 'fill-white';
			break;
		case 'warm':
			$background_colour = 'bg-warm';
			$heading_colour = 'text-dark';
			$text_colour = 'text-warm-text';
			$button_style = '';
			$border_colour = 'border-warm-text';
			break;
		case 'white':
			$background_colour = 'bg-white';
			$heading_colour = 'text-dark';
			break;
		default:
			$background_colour = 'bg-white';
			break;
	}

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 <?php echo $background_colour;?>">
		
	<div class="container flex flex-col justify-center items-center px-8 mx-auto relative xl:px-[10%] py-12 lg:py-36 2xl:py-44">

		<h1 class="font-medium text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight max-md:self-start <?php echo $heading_colour;?>"><?php echo $heading; ?></h1>
		<p class="font-regular leading-relaxed lg:leading-loose 2xl:leading-loose text-lg lg:text-xl 2xl:text-2xl mt-4 lg:mt-6 text-center <?php echo $text_colour;?>"><?php echo $content; ?></p>
		
			<div class="w-full flex justify-center mt-6 lg:mt-16 2xl:mt-24">
				<?php 
				$leadership_portfolios = get_field( 'leadership_portfolios' ); 

				if ( $leadership_portfolios ) : ?>
					<div class="flex flex-row flex-wrap w-full justify-center gap-6 editor-only">
						<?php foreach ( $leadership_portfolios as $portfolio_id ) : 
							// Get the actual portfolio post object

							if ( $portfolio_id) : ?>
								<div class="w-full flex flex-col sm:w-[calc(50%_-_24px)] lg:w-[calc(33.3333%_-_24px)] relative">

									<a class="relative" href="<?php echo get_permalink( $portfolio_id ); ?>" aria-label="View <?php echo get_the_title( $portfolio_id ); ?>'s profile." title="View <?php echo get_the_title( $portfolio_id ); ?>'s profile.">
										<?php if ( has_post_thumbnail($portfolio_id) ) : ?>
											<?php echo get_the_post_thumbnail( $portfolio_id, 'full', array( 'class' => 'w-full aspect-square object-cover h-auto bg-white' ) ); ?>
										<?php else: ?>
											<div class="w-full h-full fill-dark bg-white">
												<?php require get_template_directory() . "/theme-parts/icons/image-not-found.php"; // Include image not found icon ?>
											</div>
										<?php endif; ?>
										<div class="flex justify-center items-center <?php echo $icon_colour; ?> bg-white w-8 h-8 p-1 rounded-full absolute bottom-4 right-4 z-1" title="View <?php echo get_the_title( $portfolio_id ); ?>'s profile." role="presentation">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.21 0-4 1.791-4 4s1.79 4 4 4c2.209 0 4-1.791 4-4s-1.791-4-4-4zm-.004 3.999c-.564.564-1.479.564-2.044 0s-.565-1.48 0-2.044c.564-.564 1.479-.564 2.044 0s.565 1.479 0 2.044z"/></svg>
										</div>
									</a>

									<div class="h-full px-10 py-16 lg:px-12 xl:py-24 <?php echo $background_colour_vivid; ?>">
										<h2 class="font-medium text-2xl lg:text-3xl 2xl:text-4xl leading-normal lg:leading-normal 2xl:leading-normal sm:min-h-28 2xl:min-h-32 flex <?php echo $heading_colour;?>">
											<span class="flex self-end pb-4 lg:pb-6"><?php echo get_the_title( $portfolio_id ); ?></span>
										</h2>
										<hr class="min-w-full w-fit lg:min-w-[65%] mb-4 lg:mb-6 border-2 border-solid <?php echo $border_colour;?>" aria-hidden="true" role="presentation" />
										<p class="font-normal text-xl leading-normal lg:text-2xl lg:leading-normal"><?php echo get_field( 'leadership_description', $portfolio_id ); ?></p>
									</div>

								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
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