<?php
/**
 * Block template file: pricing-set.php
 *
 * Pricing Set Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pricing-set-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-pricing-set';
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

	// Set the bottom padding
	if ( get_field( 'bottom_padding_toggle' ) == 1 ) :
		$bottom_padding = "max-lg:pb-12 lg:pb-36 2xl:pb-44";
		$bottom_padding_toggle = true;
	else :
		$bottom_padding = "";
		$bottom_padding_toggle = false;
	endif;

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

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 parent-element <?php echo $background_colour;?>">

	<div class="<?php echo $background_colour_vivid; ?>">
		<div class="container flex flex-col justify-center items-center px-8 mx-auto relative max-lg:pt-12 lg:pt-36 2xl:pt-44 max-lg:pb-24 lg:pb-[18rem] 2xl:pb-[22rem]">
			<h1 class="font-medium text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight <?php echo $heading_colour;?>"><?php echo $heading; ?></h1>
			<p class="font-regular leading-relaxed lg:leading-loose 2xl:leading-loose text-lg lg:text-xl 2xl:text-2xl mt-4 lg:mt-6 text-center <?php echo $text_colour;?>"><?php echo $content; ?></p>
		</div>
	</div>
		
	<div class="container flex flex-col justify-center items-center px-8 mx-auto relative transformed-element <?php if($bottom_padding_toggle) : echo $bottom_padding; endif; ?>">
		
			<div class="w-full flex justify-center mt-6 lg:mt-16 2xl:mt-24">
				<?php 
				$pricing_sets = get_field( 'pricing_sets' ); 

				if ( $pricing_sets ) : ?>
					<div class="flex flex-row flex-wrap w-full justify-center gap-6 editor-only">
						<?php foreach ( $pricing_sets as $set_id ) : 
							$custom = false;
							// Get the actual portfolio post object
							if ( $set_id) :
								// Get the price
								if ( get_field( 'custom_price_toggle', $set_id ) == 1 ) {
									$custom = true;
								} else {
									$price = '$' . get_field( 'price', $set_id ) . '.00';
								}
								// Set the prepend and append content
								if ( get_field( 'price_prepend', $set_id ) == 1 ) {
									$prepend = get_field( 'price_prepend_content', $set_id );
								} else {
									$prepend = '';
								}
								if ( get_field( 'price_append', $set_id ) == 1 ) {
									$append = get_field( 'price_append_content', $set_id );
								} else {
									$append = '';
								}	

								$custom_price_contact = get_field( 'custom_price_contact', $set_id );
								if ( $custom_price_contact ) { 
									$url = $custom_price_contact['url'];
									$target = $custom_price_contact['target'];
									$title = $custom_price_contact['title'];
								}

							?>

								<div class="w-full flex flex-col sm:w-[calc(50%_-_24px)] lg:w-[calc(25%_-_24px)] relative">
									<div class="relative">
										<?php if ( has_post_thumbnail($set_id) ) : ?>
											<?php echo get_the_post_thumbnail( $set_id, 'full', array( 'class' => 'w-full aspect-square object-cover h-auto bg-white' ) ); ?>
										<?php else: ?>
											<div class="w-full h-full fill-dark bg-white">
												<?php require get_template_directory() . "/theme-parts/icons/image-not-found.php"; // Include image not found icon ?>
											</div>
										<?php endif; ?>
									</div>

									<div class="flex flex-col h-full px-10 pb-16 lg:pb-12 xl:pb-24 <?php echo $background_colour_vivid; ?>">
										<h2 class="font-medium text-xl lg:text-[22px] 2xl:text-3xl leading-normal lg:leading-normal 2xl:leading-normal sm:min-h-28 flex max-sm:mt-6 <?php echo $heading_colour;?>">
											<span class="flex self-end mb-1 lg:mb-2"><?php echo get_the_title( $set_id ); ?></span>
										</h2>
										<div class="flex flex-col gap-y-4 lg:gap-y-8">
											<?php if ($custom) : ?>
												<?php if ( $custom_price_contact ) : ?>
													<div class="flex flex-row items-center gap-x-2 font-normal text-xl leading-normal 2xl:text-2xl 2xl:leading-normal">
														<a class="btn small" href="<?php echo esc_url( $url ); ?>" target="<?php echo esc_attr( $target ); ?>"><?php echo esc_html( $title ); ?></a>
													</div>
												<?php endif; ?>
											<?php else: ?>
												<div class="font-normal text-xl leading-normal 2xl:text-2xl 2xl:leading-normal">
													<span class="font-semibold text-base 2xl:text-lg"><?php echo $prepend; ?></span>
													<?php echo $price; ?>
													<span class="font-semibold text-base 2xl:text-lg"><?php echo $append; ?></span>
												</div>
											<?php endif; ?>
											<hr class="w-full border  border-solid <?php echo $border_colour;?>" aria-hidden="true" role="presentation" />
											<div class="flex flex-col gap-y-2">
												<h3 class="font-medium text-base lg:text-lg xl:text-xl italic leading-none lg:leading-none 2xl:leading-none">Includes:</h3>
												<div class="font-normal leading-normal wysiwyg wysiwyg-small"><?php echo get_field( 'pricing_details', $set_id ); ?></div>
											</div>
										</div>
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