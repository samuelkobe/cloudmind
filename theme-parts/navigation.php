<?php 
	$mobile_menu_bg = get_field( 'mobile_menu_background_block_colour_settings', 'option' );
	if(get_field('page_colour_block_colour_settings')) {
		$header_bg = get_field( 'page_colour_block_colour_settings' );
	} else {
		$header_bg = get_page_colour();
	}
	$desktop_text_colour = 'text-dark';
	$icon_colour = 'fill-dark';
	$menu_icon_colour = 'text-dark';
	if ($header_bg === 'dark') {
		$menu_icon_colour = 'text-white';
		$desktop_text_colour = 'text-white';
		$mobile_text_colour = 'md:text-white';
		echo '
		<style>
			@media (min-width: 768px) {
				nav > div > div > div > ul > li.active > a {
					border-color: #fff;
				}
				nav > div > div > div > ul > li > a:hover {
					border-color: #fff;
				}
			}
		</style>';
	}
	if ($mobile_menu_bg === 'dark') {
		$mobile_text_colour = 'max-md:text-white';
		$mobile_menu_anchor_border = 'border-b-white';
		$icon_colour = 'fill-white';
		echo '
		<style>
			@media (max-width: 767px) {
				nav > div > div > div > ul > li.active > a {
					border-color: #fff;
				}
				nav > div > div > div > ul > li > a:hover {
					border-color: #fff;
				}
			}
		</style>';
	}
	if ($header_bg === 'dark') {

	}
?>

<nav x-data="{ mobileMenuIsOpen: false }" @click.away="mobileMenuIsOpen = false" class="h-20 md:h-[120px] 2xl:h-[160px] z-10 relative" aria-label="menu">
	<div class="w-full h-full inset-0 absolute z-1 md:-z-1 bg-<?php echo $header_bg; ?>" role="presentation" aria-hidden="true"></div>
	<div class="container mx-auto px-6 h-full flex items-center justify-between">

		<?php $menu_icon = get_field( 'menu_icon', 'option' ); ?>
		<?php if ( $menu_icon ) : ?>
			<a href="<?php echo esc_url( get_home_url() ); ?>" title="<?php bloginfo( 'name' ); ?>" class="flex items-center">
				<div class="py-4 md:py-0 max-md:z-1 static">
					<img class="w-36 sm:w-40 md:w-48 2xl:w-64 transition-transform hover:scale-105" src="<?php echo esc_url( $menu_icon['url'] ); ?>" alt="<?php echo esc_attr( $menu_icon['alt'] ); ?>" />
				</div>
			</a>
		<?php endif; ?>
		
		<div class="flex md:flex-col gap-x-6 md:gap-x-0 items-end justify-center">
		
			<div class="w-fit md:mb-8 max-md:z-1 static">

			<?php if ( get_field( 'menu_button_toggle', 'option' ) == 1 ) : ?>
				<?php if ( get_field( 'contact_type_toggle', 'option' ) == 1 ) : ?>
					<a class="btn menu" href="mailto:<?php echo get_field( 'email', 'option' ); ?>" target="_blank" rel="noopener noreferrer">Contact</a>
					<?php else : ?>
						<?php $contact_page_link = get_field( 'contact_page_link', 'option' ); ?>
						<?php if ( $contact_page_link ) : ?>
							<a class="btn menu"  href="<?php echo esc_url( $contact_page_link['url'] ); ?>" target="<?php echo esc_attr( $contact_page_link['target'] ); ?>"><?php echo esc_html( $contact_page_link['title'] ); ?></a>
						<?php endif; ?>
				<?php endif; ?>
			<?php else : ?>
				<?php // No button in the menu ?>
			<?php endif; ?>

      </div>

			<!-- Mobile Menu Button -->
			<button x-data="{ bodyClass: 'max-md:overflow-hidden', $refs: { body: document.body }}" @click="mobileMenuIsOpen = !mobileMenuIsOpen; $nextTick(() => $refs.body.classList.toggle(bodyClass))" :aria-expanded="mobileMenuIsOpen" type="button" class="flex pt-1 <?php echo $menu_icon_colour; ?> dark:<?php echo $menu_icon_colour; ?> md:hidden justify-end z-1 md:-z-1 static transform -translate-y-[2px]" aria-label="mobile menu" aria-controls="mobileMenu">
				<svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-8 stroke-caramel">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
				</svg>
				<svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-8">
					<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
				</svg>
			</button>
			
			<div :class="mobileMenuIsOpen ? ' translate-y-0 md:translate-y-0' : '-translate-y-[100dvh] duration-300 sm:duration-0'" class="<?php echo $mobile_text_colour; ?> lg:<?php echo $desktop_text_colour;?> absolute transform duration-300 transition-transform sm:duration-0 md:translate-y-0 md:relative top-20 -z-1 md:z-0 left-0 md:top-auto md:left-auto bg-<?php echo $mobile_menu_bg; ?> md:bg-transparent w-full h-[calc(100dvh-80px)] md:w-auto md:h-auto p-8 md:p-0">
				<?php webokstarter_nav_desktop(); ?>
					<?php if ( have_rows( 'social_media_accounts', 'option' ) ) : ?>
						<div :class="mobileMenuIsOpen ? 'max-md:flex max-md:mt-6' : null" class="hidden">
							<ul class="flex flex-row space-x-4" role="navigation" aria-label="Social Media Navigation">
							<?php while ( have_rows( 'social_media_accounts', 'option' ) ) : the_row(); ?>
								<?php if ( get_sub_field( 'activate' ) == 1 ) : ?>
									<?php $icon = get_sub_field( 'icon' ); ?>
									<li class="w-9 h-9 list-none">
										<a class="<?php echo $icon_colour; ?>" href="<?php echo get_sub_field( 'url' ); ?>" name="Icon link to <?php echo get_sub_field( 'name' ); ?>" target="_blank">
											<?php if ( is_string( $icon ) ) :
												echo $icon;
											endif; ?>
										</a>
									</li>
								<?php endif; ?>
							<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>
			</div>

		</div>

	</div>
</nav>