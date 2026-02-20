<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> scroll-m-20 <?php echo $background_colour;?>">
				
			<div class="container flex flex-col justify-center items-center px-8 mx-auto relative xl:px-[10%] py-12 lg:py-36 2xl:py-44">

				<h1 class="font-medium text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight max-md:self-start text-dark text-center w-full"><?php echo get_field('testimonials_heading', 'option'); ?></h1>
				<p class="font-regular leading-relaxed lg:leading-loose 2xl:leading-loose text-lg lg:text-xl 2xl:text-2xl mt-4 lg:mt-6 text-center text-dark"><?php echo get_field('testimonials_content', 'option'); ?></p>

			<?php get_template_part( 'loop-testimonial' ); ?>

			<?php get_template_part( 'pagination' ); ?>

			</div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
