<?php
/**
 * Block template file: side-by-side.php
 *
 * Side by Side Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'side-by-side-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-side-by-side';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}

// Set variables
$heading       = get_field( 'heading' );
$description   = get_field( 'description' );
$colour_scheme = get_field( 'block_settings_block_colour_settings' );

// Colour scheme defaults
$background_colour = 'bg-white';
$heading_colour    = 'text-dark';
$text_colour       = 'text-dark';
$card_bg_colour    = 'bg-secondary';
$card_title_colour = 'text-dark';
$card_text_colour  = 'text-dark';
$button_style      = 'warm';
$quote_line_colour = 'border-main';
$divider_colour    = 'border-black/10';

switch ( $colour_scheme ) {
	case 'off-white':
		$background_colour = 'bg-off-white';
		break;
	case 'main':
		$background_colour = 'bg-main';
		$quote_line_colour = 'border-dark';
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
		$heading_colour    = 'text-white';
		$text_colour       = 'text-white';
		$button_style      = 'alt';
		break;
	case 'warm':
		$background_colour = 'bg-warm';
		$heading_colour    = 'text-dark';
		$text_colour       = 'text-warm-text';
		$card_bg_colour    = 'bg-warm-card';
		$card_title_colour = 'text-dark';
		$card_text_colour  = 'text-warm-text';
		$divider_colour    = 'border-warm-text/20';
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
				<h2 class="font-bold text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight text-center <?php echo $heading_colour; ?>"><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>

			<?php if ( $description ) : ?>
				<p class="font-medium leading-relaxed text-base lg:text-lg text-center max-w-3xl <?php echo $text_colour; ?>"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>

			<?php if ( have_rows( 'cards' ) ) : ?>
				<div class="flex flex-wrap justify-center gap-8 w-full mt-8" role="list">
					<?php while ( have_rows( 'cards' ) ) : the_row();
						$card_title         = get_sub_field( 'card_title' );
						$card_subtitle      = get_sub_field( 'card_subtitle' );
						$card_text          = get_sub_field( 'card_text' );
						$card_button        = get_sub_field( 'card_button' );
						$testimonial_toggle = get_sub_field( 'testimonial_toggle' );
						$testimonial_quote  = get_sub_field( 'testimonial_quote' );
						$testimonial_name   = get_sub_field( 'testimonial_name' );
						$testimonial_role   = get_sub_field( 'testimonial_role' );
					?>
						<div class="w-full md:w-[calc(50%-32px)] flex flex-col" role="listitem">

							<!-- Card box -->
							<div class="side-by-side__card <?php echo $card_bg_colour; ?> rounded-lg p-6 lg:p-8 flex flex-col">

								<!-- Title & Subtitle -->
								<div class="mb-6">
									<?php if ( $card_title ) : ?>
										<h3 class="font-bold text-xl lg:text-2xl 2xl:text-3xl lg:leading-tight <?php echo $card_title_colour; ?> mb-2"><?php echo esc_html( $card_title ); ?></h3>
									<?php endif; ?>
									<?php if ( $card_subtitle ) : ?>
										<h4 class="font-medium text-base lg:text-lg 2xl:text-xl lg:leading-tight <?php echo $card_title_colour; ?>"><?php echo esc_html( $card_subtitle ); ?></h4>
									<?php endif; ?>
								</div>

								<!-- Divider -->
								<hr class="border-t <?php echo $divider_colour; ?> lg:mt-6 mb-4 w-full">

								<!-- Content -->
								<div class="flex flex-col items-start text-left flex-grow gap-y-4">
									<?php if ( $card_text ) : ?>
										<p class="text-base <?php echo $card_text_colour; ?> leading-relaxed"><?php echo wp_kses( $card_text, [ 'br' => [] ] ); ?></p>
									<?php endif; ?>
								</div>

								<!-- Button -->
								<?php if ( $card_button ) : ?>
									<div class="mt-6">
										<a
											class="btn <?php echo $button_style; ?> small"
											href="<?php echo esc_url( $card_button['url'] ); ?>"
											target="<?php echo esc_attr( $card_button['target'] ); ?>"
											<?php if ( $card_button['target'] === '_blank' ) : ?>rel="noopener noreferrer"<?php endif; ?>
										>
											<?php echo esc_html( $card_button['title'] ); ?>
										</a>
									</div>
								<?php endif; ?>

							</div>

							<!-- Testimonial (outside card box, on block background) -->
							<?php if ( $testimonial_toggle ) : ?>
								<div class="mt-6 pl-5 border-l-4 <?php echo $quote_line_colour; ?>">
									<?php if ( $testimonial_quote ) : ?>
										<p class="italic text-base lg:text-lg leading-relaxed <?php echo $text_colour; ?> mb-4">&ldquo;<?php echo esc_html( $testimonial_quote ); ?>&rdquo;</p>
									<?php endif; ?>
									<?php if ( $testimonial_name ) : ?>
										<p class="font-bold text-xs uppercase tracking-widest <?php echo $text_colour; ?> mb-1"><?php echo esc_html( $testimonial_name ); ?></p>
									<?php endif; ?>
									<?php if ( $testimonial_role ) : ?>
										<p class="text-xs uppercase tracking-widest <?php echo $text_colour; ?> opacity-60"><?php echo esc_html( $testimonial_role ); ?></p>
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
