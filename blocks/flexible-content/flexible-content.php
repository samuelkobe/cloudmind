<?php
/**
 * Block template file: flexible-content.php
 *
 * Flexible Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'flexible-content-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-flexible-content';
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
	// Set the button style
	$button_style = '';
	if ( get_field( 'column_settings' ) == 1 ) {
		$dynamic_col_count = "lg:grid-cols-[1fr_1fr] lg:[grid-template-areas:'leftcol_rightcol']";
		$left_col = "flex flex-col items-start justify-center lg:[grid-area:leftcol] lg:min-w-[50%]";
		$right_col = "flex flex-col items-start justify-center lg:[grid-area:rightcol] lg:min-w-[50%]";
		$image_padding = "lg:pr-[8.33%]";
	} else  {
		$dynamic_col_count = "lg:grid-cols-[1fr] lg:[grid-template-areas:'singlecol']";
		$left_col = "flex flex-col items-start justify-center lg:[grid-area:singlecol]";
	}
	if ( get_field( 'bottom_padding_toggle' ) == 1 ) :
		$bottom_padding = "last:max-lg:pb-12 lg:pb-36 2xl:pb-44";
		$bottom_padding_toggle = true;
	else :
		$bottom_padding = "";
		$bottom_padding_toggle = false;
	endif;
	// Set the colour scheme
	$colour_scheme = get_field( 'block_settings_block_colour_settings' );
	switch ($colour_scheme) {
		case 'off-white':
			$background_colour = 'bg-off-white';
			$heading_colour = 'text-dark';
			$subheading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		case 'main':
			$background_colour = 'bg-main';
			$heading_colour = 'text-dark';
			$subheading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		case 'secondary':
			$background_colour = 'bg-secondary';
			$heading_colour = 'text-dark';
			$subheading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		case 'tertiary':
			$background_colour = 'bg-tertiary';
			$heading_colour = 'text-dark';
			$subheading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		case 'quaternary':
			$background_colour = 'bg-quaternary';
			$heading_colour = 'text-dark';
			$subheading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		case 'dark':
			$background_colour = 'bg-dark-gray';
			$heading_colour = 'text-white';
			$subheading_colour = 'text-white';
			$content_colour = 'text-white';
			$button_style = 'alt';
			break;
		case 'white':
			$background_colour = 'bg-white';
			$heading_colour = 'text-dark';
			$subheading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
		default:
			$background_colour = 'bg-white';
			$heading_colour = 'text-dark';
			$subheading_colour = 'text-dark';
			$content_colour = 'text-dark';
			break;
	}

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 lg:min-h-[35dvh] flex flex-col justify-center <?php echo $background_colour;?>">

	<div class="container px-6 mx-auto relative xl:px-[10%]">

		<div class="flex flex-col lg:grid lg:grid-rows-[1fr] max-md:gap-y-4 max-lg:gap-y-8 lg:gap-x-24 group <?php echo $dynamic_col_count ?>">

			<?php if ( have_rows( 'column_one_flexible_columns' ) ): ?>
				<div class="<?php echo $left_col; ?> first:max-lg:pt-12 lg:pt-36 2xl:pt-44 flex flex-col gap-y-8 group-has-[div:first-child_div[data-media-padding='true']]:lg:pt-[10dvh] <?php if($bottom_padding_toggle) : echo $bottom_padding; endif; ?>" data-flexible-col="left">
					<?php while ( have_rows( 'column_one_flexible_columns' ) ) : the_row(); ?>
						<?php include( 'flexible-parts/all-parts-loop.php' ); ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php if ( have_rows( 'column_two_flexible_columns' ) && have_rows( 'column_one_flexible_columns' ) ): ?>
				<div class="<?php echo $right_col; ?> first:pt-12 lg:pt-36 2xl:pt-44 <?php if($bottom_padding_toggle) : echo $bottom_padding; endif; ?>" data-flexible-col="right">
					<?php while ( have_rows( 'column_two_flexible_columns' ) ) : the_row(); ?>
						<?php include( 'flexible-parts/all-parts-loop.php' ); ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php if ( !have_rows( 'column_one_flexible_columns' ) ): ?>
				<p class="<?php echo $heading_colour;?>">Either <b>Left/Top Column</b> is empty or this block has no content.</p>
			<?php endif; ?>

		</div>

	</div>

</section>