<?php
/**
 * Block template file: client-media.php
 *
 * Client Media Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'client-media-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-client-media';
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
			$border_colour = 'border-white';
			$icon_colour = 'fill-white';
			break;
		case 'warm':
			$background_colour = 'bg-warm';
			$heading_colour = 'text-dark';
			$text_colour = 'text-warm-text';
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
		
	<div class="container flex flex-col justify-center items-center px-8 mx-auto relative xl:px-[10%] max-lg:pt-12 lg:pt-36 2xl:pt-44 <?php if($bottom_padding_toggle) : echo $bottom_padding; endif; ?>">

		<h1 class="font-medium text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight max-md:self-start <?php echo $heading_colour;?>"><?php echo $heading; ?></h1>
		<p class="font-regular leading-relaxed lg:leading-loose 2xl:leading-loose text-lg lg:text-xl 2xl:text-2xl mt-4 lg:mt-6 lg:text-center <?php echo $text_colour;?>"><?php echo $content; ?></p>
		
			<div class="w-full flex justify-center mt-6 lg:mt-8 2xl:mt-12">
				<?php if ( have_rows( 'media' ) ) : ?>
		

					<div class="w-full flex flex-row flex-wrap justify-center gap-6 editor-only">
						<?php while ( have_rows( 'media' ) ) : the_row(); ?>
							<?php 
								$aspect_ratio = get_sub_field( 'image_aspect_ratio' );
								$video_id = 'video-' . bin2hex(random_bytes(8));
							?>

								<div class="w-full flex flex-col sm:w-[calc(50%_-_24px)] lg:w-[calc(33.3333%_-_24px)] relative">

										<?php if ( get_sub_field( 'media_type' ) == 1 ) : ?>

											<div class="w-full object-cover h-auto bg-white" data-media-padding="true">
												<?php $image = get_sub_field( 'image' ); ?>
												<?php if ( $image ) : ?>
													<img class="w-full object-cover aspect-<?php echo $aspect_ratio;?> " src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
												<?php endif; ?>
											</div>

										<?php else : ?>

											<div class="w-full" data-media-padding="true">
												<?php if ( get_sub_field( 'video_source' ) == 1 ) : ?>

													<div class="w-full aspect-<?php echo $aspect_ratio;?> relative">
														<?php 
															if ( get_sub_field( 'video_file' ) ) :
																$video = get_sub_field( 'video_file' );
																$video_element = '<video
																										id="' . $video_id . '"
																										class="absolute top-0 left-0 w-full h-full object-cover"
																										preload="metadata"
																										muted
																										autoplay
																										loop
																										playsinline
																										src="' . $video . '"
																										type="video/mp4">
																										Sorry, your browser doesn\'t support embedded videos.
																									</video>';
															endif; ?>
														<?php echo $video_element;?>

														<?php // the video controls if they are required ?>
														<div class="absolute right-3 bottom-3 z-1 flex space-x-2">
															<?php if ( get_sub_field( 'video_controls_toggle' ) == 1 ) : ?>
																	<?php include( 'icons/play-pause.php' ); ?>
																	<?php include( 'icons/volume.php' ); ?>
															<?php endif; ?>
														</div>
													</div>

												<?php else : ?>

													<div class="w-full">
														<div class="video-embed mt-6 mb-0 lg:my-12 2xl:my-16">
																<?php echo get_sub_field( 'video_embed' ); ?>
														</div>
													</div>

												<?php endif; ?>
											</div>
											
										<?php endif; ?>

								</div>
							
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>

	</div>

</section>