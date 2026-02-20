<?php
/**
 * Block template file: cta.php
 *
 * Cta Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-cta';
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
// Set variables
	$heading = get_field( 'heading' );
	$content = get_field( 'content' );
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
		case 'white':
			$background_colour = 'bg-white';
			$heading_colour = 'text-dark';
			break;
		default:
			$background_colour = 'bg-white';
			break;
	}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 <?php echo $background_colour; ?>">

	<div class="container px-8 mx-auto relative xl:px-[10%] py-12 lg:py-32 2xl:py-36">
		<div class="w-full flex flex-col gap-y-4 items-center justify-center">
			<?php if ($heading != ''): ?>
				<h1 class="font-medium text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight <?php echo $heading_colour;?>"><?php echo $heading; ?></h1>
			<?php endif; ?>

			<?php if ($content != ''): ?>
				<p class="font-medium leading-relaxed text-base lg:text-lg text-center <?php echo $text_colour;?>"><?php echo $content; ?></p>
			<?php endif; ?>

			<?php $button = get_field( 'button' ); ?>
			<?php if ( $button ) : ?>
				<div class="w-fit mt-6">
					<a class="btn <?php echo $button_style; ?>" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
						<?php echo esc_html( $button['title'] ); ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>

</section>