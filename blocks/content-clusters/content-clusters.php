<?php
/**
 * Block template file: content-clusters.php
 *
 * Content Clusters Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'content-clusters-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-content-clusters';
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
	// Set the bottom padding
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
			break;
		case 'warm':
			$background_colour = 'bg-warm';
			$heading_colour = 'text-dark';
			$subheading_colour = 'text-warm-text';
			$content_colour = 'text-warm-text';
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

	<div class="container px-6 mx-auto relative xl:px-[10%] pt-12 lg:pt-36 <?php if($bottom_padding_toggle) : echo $bottom_padding; endif; ?>">
			
		<?php if ( have_rows( 'clusters' ) ) : ?>
			<div class="grid grid-cols-4 lg:grid-cols-3 gap-8 lg:gap-16 w-full <?php echo $content_colour; ?>">
				<?php while ( have_rows( 'clusters' ) ) : the_row(); ?>
					<div class="col-span-4 md:col-span-2 lg:col-span-1">
						<?php if (get_sub_field( 'cluster_type_toggle' ) == 0): ?>
							<h3 class="uppercase font-sans font-semibold tracking-widest text-[1.875rem] xl:text-[48px] w-full mb-1 xl:mb-2 mt-4 xl:mt-8 2xl:w-3/4"><?php the_sub_field( 'cluster_title' ); ?></h3>
						<?php else: ?>
							<h3 class="uppercase font-sans font-semibold tracking-widest text-[20px] xl:text-[32px] w-full mb-1 xl:mb-2 mt-4 xl:mt-8"><?php the_sub_field( 'cluster_title' ); ?></h3>
						<?php endif; ?>
						<p class="text-base xl:text-xl <?php echo $content_colour; ?>"><?php the_sub_field( 'cluster_content' ); ?></p>
					</div>
				<?php endwhile; ?>
			</div>
			
		<?php else : ?>
			<?php // No rows found ?>
		<?php endif; ?>

	</div>

</section>