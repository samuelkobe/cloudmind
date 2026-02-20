<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section class="bg-white">

			<!-- article -->
			<article class="container flex flex-col justify-center items-center px-8 mx-auto relative xl:px-[10%] py-12 lg:pb-28 lg:pt-24" id="post-404">

				<div class="flex flex-col gap-y-8 items-center justify-center text-center text-dark">

					<h1 class="flex flex-col font-medium text-6xl lg:text-7xl 2xl:text-[10rem] lg:leading-tight">
						<?php esc_html_e( '404', 'webokstarter_wp' ); ?>
						<span class="font-medium text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight mt-8"><?php the_field( 'heading_404', 'option' ); ?></span>
					</h1>
					
					<p class="font-normal text-base lg:text-xl 2xl:text-2xl mx-auto w-full lg:w-[70%] mb-2 lg:mb-8"><?php echo get_field( 'content_404', 'option' ); ?></p>

					<?php $redirect_404 = get_field( 'redirect_404', 'option' ); ?>
					<?php if ( $redirect_404 ) : ?>
						<a class="btn" href="<?php echo esc_url( $redirect_404['url'] ); ?>" target="<?php echo esc_attr( $redirect_404['target'] ); ?>"><?php echo esc_html( $redirect_404['title'] ); ?></a>
					<?php endif; ?>

				</div>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
