<?php
/**
 * Block template file: three-cards.php
 *
 * Three Cards Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'three-cards-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-three-cards';
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
	$description = get_field( 'description' );
	$bottom_sentence = get_field( 'bottom_sentence' );
	$icon_colour = get_field( 'icon_colour' ) ?: '#d3a852';
	$button = get_field( 'button' );
	$colour_scheme = get_field( 'block_settings_block_colour_settings' );
	$background_colour = '';
	$heading_colour = 'text-dark';
	$text_colour = 'text-dark';
	$card_bg_colour = 'bg-secondary';
	$card_title_colour = 'text-dark';
	$card_text_colour = 'text-dark';
	$button_style = 'warm';

	// Set the colour scheme
	switch ($colour_scheme) {
		case 'off-white':
			$background_colour = 'bg-off-white';
			break;
		case 'main':
			$background_colour = 'bg-main';
			break;
		case 'secondary':
			$background_colour = 'bg-secondary';
			break;
		case 'tertiary':
			$background_colour = 'bg-tertiary';
			break;
		case 'quaternary':
			$background_colour = 'bg-quaternary';
			break;
		case 'dark':
			$background_colour = 'bg-dark';
			$heading_colour = 'text-white';
			$text_colour = 'text-white';
			$button_style = 'alt';
			break;
		case 'warm':
			$background_colour = 'bg-warm';
			$heading_colour = 'text-dark';
			$text_colour = 'text-warm-text';
			$card_bg_colour = 'bg-warm-card';
			$card_title_colour = 'text-dark';
			$card_text_colour = 'text-warm-text';
			break;
		case 'white':
			$background_colour = 'bg-white';
			break;
		default:
			$background_colour = 'bg-white';
			break;
	}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 <?php echo $background_colour; ?>" aria-label="<?php echo esc_attr( $heading ); ?>">

	<div class="container px-8 mx-auto relative xl:px-[10%] py-12 lg:py-32 2xl:py-36">
		<div class="w-full flex flex-col gap-y-4 items-center justify-center">

			<?php if ( $heading ) : ?>
				<h2 class="font-medium text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight text-center <?php echo $heading_colour; ?>"><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>

			<?php if ( $description ) : ?>
				<p class="font-medium leading-relaxed text-base lg:text-lg text-center max-w-3xl <?php echo $text_colour; ?>"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>

			<?php if ( have_rows( 'cards' ) ) : ?>
				<div class="flex flex-wrap justify-center gap-6 lg:gap-8 w-full mt-8" role="list">
					<?php while ( have_rows( 'cards' ) ) : the_row();
						$card_icon = get_sub_field( 'card_icon' );
						$card_title = get_sub_field( 'card_title' );
						$card_text = get_sub_field( 'card_text' );
					?>
						<div class="three-cards__card <?php echo $card_bg_colour; ?> rounded-lg p-6 lg:p-8 flex flex-col items-center text-center gap-y-4 w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-22px)] shrink-0" role="listitem">
							<?php if ( $card_icon ) :
								$icon_path = get_attached_file( $card_icon['ID'] );
								$icon_svg = $icon_path && file_exists( $icon_path ) ? file_get_contents( $icon_path ) : '';
							?>
								<div class="w-16 h-16 lg:w-20 lg:h-20 bg-white rounded-lg flex items-center justify-center" aria-hidden="true">
									<?php if ( $icon_svg ) :
										$icon_svg = preg_replace( '/<\?xml[^>]*\?>/', '', $icon_svg );
										$is_stroke = ( strpos( $icon_svg, 'stroke=' ) !== false && ( strpos( $icon_svg, 'fill="none"' ) !== false || strpos( $icon_svg, "fill='none'" ) !== false ) );
										if ( $is_stroke ) :
											$icon_svg = preg_replace( '/stroke="(?!none)[^"]*"/', 'stroke="' . esc_attr( $icon_colour ) . '"', $icon_svg );
											$icon_svg = str_replace( '<svg', '<svg class="w-10 h-10 lg:w-12 lg:h-12"', $icon_svg );
										else :
											$icon_svg = preg_replace( '/fill="(?!none)[^"]*"/', 'fill="' . esc_attr( $icon_colour ) . '"', $icon_svg );
											$icon_svg = str_replace( '<svg', '<svg class="w-10 h-10 lg:w-12 lg:h-12"', $icon_svg );
										endif;
										echo $icon_svg;
									else : ?>
										<img
											src="<?php echo esc_url( $card_icon['url'] ); ?>"
											alt=""
											class="w-10 h-10 lg:w-12 lg:h-12"
											loading="lazy"
										>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if ( $card_title ) : ?>
								<h3 class="font-medium text-lg lg:text-xl 2xl:text-2xl lg:leading-tight <?php echo $card_title_colour; ?>"><?php echo esc_html( $card_title ); ?></h3>
							<?php endif; ?>

							<?php if ( $card_text ) : ?>
								<p class="text-base <?php echo $card_text_colour; ?> leading-relaxed"><?php echo esc_html( $card_text ); ?></p>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php if ( $bottom_sentence ) : ?>
				<p class="font-medium leading-relaxed text-base lg:text-lg text-center mt-8 <?php echo $text_colour; ?>"><?php echo esc_html( $bottom_sentence ); ?></p>
			<?php endif; ?>

			<?php if ( $button ) : ?>
				<div class="w-fit mt-4">
					<a
						class="btn <?php echo $button_style; ?>"
						href="<?php echo esc_url( $button['url'] ); ?>"
						target="<?php echo esc_attr( $button['target'] ); ?>"
						<?php if ( $button['target'] === '_blank' ) : ?>rel="noopener noreferrer"<?php endif; ?>
					>
						<?php echo esc_html( $button['title'] ); ?>
					</a>
				</div>
			<?php endif; ?>

		</div>
	</div>

</section>
