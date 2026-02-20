<div class="w-full flex justify-center mt-6 lg:mt-16 2xl:mt-24">
	<div class="flex flex-row flex-wrap w-full justify-center gap-6 editor-only">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<?php $post_id = get_the_ID(); ?>
			<div class="w-full flex flex-col sm:w-[calc(50%_-_24px)] lg:w-[calc(33.3333%_-_24px)] lg:min-w-[calc(33.3333%_-_24px)] relative">

				<a class="w-full relative flex" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'full', array( 'class' => 'w-full aspect-square object-cover h-auto bg-white border-2 border-off-white' ) ); ?>
					<?php else: ?>
						<div class="w-full h-full fill-dark bg-white border-2 border-off-white">
							<?php require get_template_directory() . "/theme-parts/icons/image-not-found.php"; // Include image not found icon ?>
						</div>
					<?php endif; ?>
					<div class="flex justify-center items-center fill-dark bg-white w-8 h-8 p-1 rounded-full absolute bottom-4 right-4 z-1" title="<?php the_title_attribute(); ?>" role="presentation">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.21 0-4 1.791-4 4s1.79 4 4 4c2.209 0 4-1.791 4-4s-1.791-4-4-4zm-.004 3.999c-.564.564-1.479.564-2.044 0s-.565-1.48 0-2.044c.564-.564 1.479-.564 2.044 0s.565 1.479 0 2.044z"/></svg>
					</div>
				</a>

				<div class="h-full px-10 py-16 lg:px-12 xl:py-24 bg-off-white">
					<h2 class="font-medium text-2xl lg:text-3xl 2xl:text-4xl leading-normal lg:leading-normal 2xl:leading-normal sm:min-h-28 2xl:min-h-32 flex text-dark">
						<span class="flex self-end pb-4 lg:pb-6"><?php the_title(); ?></span>
					</h2>
					<hr class="min-w-full w-fit lg:min-w-[65%] mb-4 lg:mb-6 border-2 border-solid border-dark" aria-hidden="true" role="presentation" />
					<p class="font-normal text-xl leading-normal lg:text-2xl lg:leading-normal"><?php echo get_field( 'leadership_description', $post_id ); ?></p> </div>

			</div>
		<?php endwhile; ?>

	</div>
<?php endif; ?>
</div>

<?php $button = get_field( 'button' ); ?>
<?php if ( $button ) : ?>
	<div class="w-fit max-md:self-start mt-8 lg:mt-16 2xl:mt-24">
		<a class="btn <?php echo $button_style; ?>" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
			<?php echo esc_html( $button['title'] ); ?>
		</a>
	</div>
<?php endif; ?>

