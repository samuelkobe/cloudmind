<?php
/**
 * Block template file: gallery.php
 *
 * Gallery Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'gallery-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
?>

<style>
    <?php echo '#gallery_' . $id; ?> {
    .swiper-pagination-bullet {
      background-color: #FFF;
      width: 24px;
      height: 24px;
      opacity: 0.7;
    }
    .swiper-pagination-bullet-active {
      opacity: 1;
    }
  }
</style>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<?php
	// Set the colour scheme
	$colour_scheme = get_field( 'block_settings_block_colour_settings' );
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
			$background_colour = 'bg-dark-gray';
			break;
		case 'warm':
			$background_colour = 'bg-warm';
			break;
		case 'white':
			$background_colour = 'bg-white';
			break;
		default:
			$background_colour = 'bg-white';
			break;
	}
?>

<section id="gallery_<?php echo $id; ?>" class="scroll-m-20 <?php echo $background_colour;?>">
		<div class="container mx-auto">
			<div class="swiper swiper-<?php echo 'gallery_' .$id; ?> relative editor-disable">
				<?php $gallery_images = get_field( 'gallery' ); ?>
				<?php if ( $gallery_images ) : ?>
					<div class="swiper-wrapper w-full h-full">
						<?php foreach ( $gallery_images as $gallery_image ): ?>
							<div class="swiper-slide !flex items-center justify-center !h-[35dvh] lg:!h-[80dvh] min-h-24 lg:min-h-[600px] w-full relative">
								<div class="bg-[#000] absolute inset-0 z-1 opacity-25"></div>
								<img class="object-cover w-full h-full aspect-video" src="<?php echo esc_url( $gallery_image['url'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" />
							</div>
						<?php endforeach; ?>
					</div>
				<?php else :
						echo 'No gallery found';
				endif; ?>

			<div class="absolute bottom-12 left-0 right-0 w-auto mx-auto">
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>

</section>


<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

  const swiper = new Swiper('.swiper-<?php echo 'gallery_' . $id; ?>', {
  // Optional parameters
  loop: true,
  slidesPerView: 1,
  centeredSlides: true,
  autoplay: {
    delay: 4000,
  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    dynamicBullets: true,
    dynamicMainBullets: 1,
    clickable: true
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 1,
    },
    1280: {
      slidesPerView: 1,
    },
    1920: {
      slidesPerView: 1,
    },
  }
});
</script>