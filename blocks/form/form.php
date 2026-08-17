<?php
/**
 * Block template file: form.php
 *
 * Form Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'form-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-form';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<?php
	// Get the colour scheme
	$colour_scheme = get_field( 'block_settings_block_colour_settings' );
	$heading = get_field( 'heading' );
	$content = get_field( 'content' );
	$form = get_field( 'form' );
	$form_colour = '';
	$border_colour = 'border-b-dark';
	$icon_colour = 'fill-dark';

	switch ($colour_scheme) {
		case 'off-white':
			$background_colour = 'bg-off-white';
			$heading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		case 'main':
			$background_colour = 'bg-main';
			$heading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		case 'secondary':
			$background_colour = 'bg-secondary';
			$heading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		case 'tertiary':
			$background_colour = 'bg-tertiary';
			$heading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		case 'quaternary':
			$background_colour = 'bg-quaternary';
			$heading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		case 'dark':
			$background_colour = 'bg-dark-gray';
			$heading_colour = 'text-white';
			$content_colour = 'text-white';
			$form_colour = 'text-white';
			$border_colour = 'border-b-white';
			$icon_colour = 'fill-white';
			$button_style = 'alt';
			break;
		case 'warm':
			$background_colour = 'bg-warm';
			$heading_colour = 'text-dark';
			$content_colour = 'text-warm-text';
			$border_colour = 'border-b-warm-text';
			break;
		case 'white':
			$background_colour = 'bg-white';
			$heading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		default:
			$background_colour = 'bg-white';
			$heading_colour = 'text-main';
			$content_colour = 'text-dark';
			break;
	}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-80 py-12 lg:py-36 2xl:py-44 <?php echo $background_colour; ?>">

	<div class="container px-6 mx-auto font-main">
		<div class="grid grid-cols-12">
			<div class="col-span-12 lg:col-span-4 2xl:col-span-3 2xl:col-start-2">
				<h2 class="font-medium text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight <?php echo $heading_colour;?>"><?php echo $heading; ?></h2>
				<?php if ( get_field( 'content_toggle' ) == 1 ) : ?>
					<p class="w-full font-main font-normal text-base leading-relaxed lg:text-xl lg:leading-loose mt-4 lg:mt-8 xl:text-lg xl:leading-[2.5rem] <?php echo $content_colour; ?>"><?php echo $content; ?></p>
				<?php endif ; ?>
				<div class="font-normal text-base leading-relaxed lg:text-xl lg:leading-loose mt-6 lg:mt-12 flex flex-col items-start justify-start gap-4 <?php echo $content_colour; ?>">
					
					<div class="flex flex-row items-center gap-x-2">
						<div class="w-7 h-7 hidden sm:block <?php echo $icon_colour;?>">
							<?php require get_template_directory() . "/theme-parts/icons/envelope-icon.php"; // Include phone icon ?>
						</div>
						<a class="contact-anchors <?php echo $border_colour; ?> w-fit leading-snug" href="mailto:<?php echo get_field( 'email', 'option' ); ?>" target="_blank"><?php the_field( 'email', 'option' ); ?></a>
					</div>

					<?php if ( get_field( 'contact_by_phone_toggle', 'option' ) == 1 ) : ?>
					<div class="flex flex-row items-center gap-x-2">
						<div class="w-7 h-7 hidden sm:block <?php echo $icon_colour;?>">
							<?php require get_template_directory() . "/theme-parts/icons/phone-icon.php"; // Include phone icon ?>
						</div>
						<a class="contact-anchors <?php echo $border_colour; ?> border-b-dark w-fit leading-snug" href="tel:<?php echo get_field( 'telephone_number', 'option' ); ?>" target="_blank"><?php the_field( 'telephone_number_text', 'option' ); ?></a>
					</div>
					<?php endif; ?>

				</div>
			</div>
			<div class="col-span-12 lg:col-span-8 2xl:col-span-8 2xl:col-start-5 <?php echo $form_colour; ?>">
				<?php echo $form; ?>
			</div>
		</div>
	</div>

</section>