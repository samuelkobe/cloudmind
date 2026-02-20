<?php
	if (get_field( 'page_colour_block_colour_settings' )) {
		$footer_bg = get_field( 'page_colour_block_colour_settings' );
	} else  {
		$footer_bg = get_page_colour();
	}
	$text_colour = 'text-dark';
	$icon_colour = 'fill-dark';
	if ($footer_bg === 'dark') {
		$desktop_text_colour = 'text-white';
		$icon_colour = 'fill-white';
	}
?>

<footer class="w-full bg-<?php echo $footer_bg; ?> py-8 lg:py-16 font-semibold font-main">
	<?php if ( have_rows( 'footer_settings', 'option' ) ) : ?>
		<?php while ( have_rows( 'footer_settings', 'option' ) ) : the_row(); ?>

			<div class="container mx-auto p-6">
				<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-12 gap-x-4 gap-y-12 md:gap-16 xl:gap-x-8">
					<div class="col-span-1 md:col-span-3 xl:col-span-8 2xl:col-span-6 order-1 xl:order-1 2xl:order-1 flex flex-col gap-y-6">
						<div class="w-fit">
							<?php $footer_logo = get_sub_field( 'footer_logo' ); ?>
							<?php if ( $footer_logo ) : ?>
								<a href="<?php echo esc_url( get_home_url() ); ?>" title="<?php bloginfo( 'name' ); ?>" class="flex items-center">
									<img class="max-sm:max-w-72 max-sm:mb-4 max-w-52 transition-transform hover:scale-105" src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" />
								</a>
							<?php endif; ?>
						</div>
						<div>
							<p class="font-normal lg:pr-4 xl:pr-16 text-base lg:text-2xl lg:leading-relaxed"><?php the_sub_field( 'company_information' ); ?></p>
						</div>

						<div class="flex flex-col gap-y-3 lg:mr-1/4">
							<h4 class="text-dark font-sans font-medium text-base md:text-lg"><?php echo get_sub_field( 'col_0_subtitle' ); ?></h4>
							<?php the_sub_field( 'newsletter' ); ?>
						</div>

						<div class="flex flex-col gap-y-3">
							<h4 class="text-dark font-sans font-medium text-base md:text-lg"><?php echo get_sub_field( 'col_1_subtitle' ); ?></h4>
							<?php if ( have_rows( 'social_media_accounts', 'option' ) ) : ?>
								<div>
									<ul class="flex flex-row space-x-4" role="navigation" aria-label="Social Media Navigation">
									<?php while ( have_rows( 'social_media_accounts', 'option' ) ) : the_row(); ?>
										<?php if ( get_sub_field( 'activate' ) == 1 ) : ?>
											<?php $icon = get_sub_field( 'icon' ); ?>
											<?php $icon_fill_color = get_sub_field( 'icon_fill_colour' ); ?>
											<?php $icon_size = get_sub_field( 'icon_size' ); ?>
											<li style="width: <?php echo $icon_size; ?>px; height: <?php echo $icon_size; ?>px;" class="list-none transition-transform scale-[.85] md:scale-100 hover:md:scale-110">
												<a class="<?php echo $icon_colour; ?>" href="<?php echo get_sub_field( 'url' ); ?>" name="Icon link to <?php echo get_sub_field( 'name' ); ?>" target="_blank">
													<?php if ( is_string( $icon ) ) : ?>
														<svg xmlns="http://www.w3.org/2000/svg" width="<?php echo $icon_size; ?>" height="<?php echo $icon_size; ?>" viewBox="0 0 24 24" fill="<?php echo $icon_fill_color; ?>">
															<?php echo $icon; ?>
														</svg>
													<?php endif; ?>
												</a>
											</li>
										<?php endif; ?>
									<?php endwhile; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<div class="col-span-1 md:col-span-2 xl:col-span-12 2xl:col-span-4 order-2 xl:order-3 2xl:order-2 flex flex-col gap-y-4 md:gap-y-8">
						<div>
							<h3 class="text-dark font-sans font-medium text-lg md:text-2xl"><?php the_sub_field( 'col_2_title' ); ?></h3>
						</div>
						<div>
							<p class="font-normal lg:pr-4 xl:pr-16 text-base lg:text-lg lg:leading-relaxed"><?php the_sub_field( 'company_information_2' ); ?></p>
						</div>
						<div class="flex flex-col gap-y-3">
							<h4 class="text-dark font-sans font-medium text-base md:text-lg"><?php the_sub_field( 'col_2_subtitle' ); ?></h4>
							<div class="flex flex-col gap-y-3">

								<div class="flex flex-row items-center gap-x-2">
									<div class="w-7 h-7 hidden sm:block">
										<?php require get_template_directory() . "/theme-parts/icons/envelope-icon.php"; // Include phone icon ?>
									</div>
									<a class="w-fit text-sm contact-anchors" href="mailto:<?php echo get_field( 'email', 'option' ); ?>" target="_blank"><?php the_field( 'email', 'option' ); ?></a>
								</div>

								<?php if ( get_field( 'contact_by_phone_toggle', 'option' ) == 1 ) : ?>
								<div class="flex flex-row items-center gap-x-2">
									<div class="w-7 h-7 hidden sm:block">
										<?php require get_template_directory() . "/theme-parts/icons/phone-icon.php"; // Include phone icon ?>
									</div>
									<a class="w-fit text-sm contact-anchors" href="tel:<?php echo get_field( 'telephone_number', 'option' ); ?>"><?php echo get_field( 'telephone_number_text', 'option' ); ?></a>
								</div>
								<?php endif; ?>

							</div>
						</div>
					</div>

					<div class="col-span-1 md:col-span-1 xl:col-span-4 2xl:col-span-2 order-3 xl:order-2 2xl:order-3 flex flex-col gap-y-4 md:gap-y-8">
						<div>
							<h3 class="text-dark font-sans font-medium text-lg md:text-2xl"><?php the_sub_field( 'col_3_title' ); ?></h3>
						</div>
						<div class="font-normal">
							<?php webokstarter_nav_footer(); ?>
						</div>
					</div>
				
					<div class="col-span-1 md:col-span-3 xl:col-span-12 order-4 w-full text-xs lg:text-sm mt-0 md:mt-4 flex flex-col gap-y-2">
						<span>Copyright &copy; <?php echo date('Y'); ?>. <?php the_sub_field( 'copyright_text' ); ?></span>
						<?php if ( get_sub_field( 'developer_toggle' ) == 1 ) : ?>
							<div>
								<span>Created by </span>
								<a href="https://webok.ca" target="_blank" aria-label="Web Ok Solutions Inc. Website" class="text-dark hover:text-main transition-colors duration-300">Web Ok Solutions Inc.</a>
							</div>
						<?php endif; ?>
					</div>


				</div>
		<?php endwhile; ?>
	<?php endif; ?>
</footer>

<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
