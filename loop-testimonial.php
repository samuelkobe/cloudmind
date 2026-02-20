<div class="w-full flex justify-center mt-6 lg:mt-16 2xl:mt-24">
	<div class="flex flex-row flex-wrap w-full justify-center gap-6 editor-only">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<?php $post_id = get_the_ID(); ?>
			<div class="w-full flex flex-col sm:w-[calc(50%_-_24px)] lg:w-[calc(33.3333%_-_24px)] lg:min-w-[calc(33.3333%_-_24px)] relative">

				<div class="w-full relative flex">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'full', array( 'class' => 'w-full aspect-square object-cover h-auto bg-white border-2 border-off-white' ) ); ?>
					<?php else: ?>
						<div class="w-full h-full fill-dark bg-white border-2 border-off-white">
							<?php require get_template_directory() . "/theme-parts/icons/testimonial.php"; // Include image not found icon ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="h-full px-10 py-16 lg:px-12 xl:py-24 bg-off-white">
					<h2 class="font-medium text-2xl lg:text-3xl 2xl:text-4xl leading-normal lg:leading-normal 2xl:leading-normal sm:min-h-28 2xl:min-h-32 flex text-dark">
						<span class="flex self-end pb-4 lg:pb-6"><?php the_title(); ?></span>
					</h2>
					<hr class="min-w-full w-fit lg:min-w-[65%] mb-4 lg:mb-6 border-2 border-solid border-dark" aria-hidden="true" role="presentation" />
					<p class="font-normal text-lg leading-normal lg:text-xl lg:leading-normal">"<?php echo get_field( 'testimonial', $post_id ); ?>" – <span class="font-semibold"><?php echo get_field( 'author', $post_id ); ?></span></p>
				</div>

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

