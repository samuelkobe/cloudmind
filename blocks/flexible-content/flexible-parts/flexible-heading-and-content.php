<?php
  $text_alignment = get_sub_field( 'text_alignment' );
?>

<div class="pt-10 lg:pt-[calc(10dvh_-_2rem)] first:!pt-0 lg:text-<?php echo $text_alignment;?>">
  <?php if ( get_sub_field( 'subheading_toggle' ) == 1 ) : ?>
    <h3 class="font-normal uppercase italic text-xl lg:text-3xl lg:leading-tight mb-4 <?php echo $heading_colour;?>"><?php echo get_sub_field( 'subheading' ); ?></h3>
  <?php endif; ?>
  <h2 class="font-medium text-3xl lg:text-[32px] 2xl:text-[40px] lg:leading-tight <?php echo $heading_colour;?>"><?php echo get_sub_field( 'heading' ); ?></h2>
  <p class="font-normal text-base leading-relaxed lg:leading-loose 2xl:text-xl 2xl:leading-loose mt-4 lg:mt-6 2xl:mt-8 <?php echo $content_colour; ?>"><?php echo get_sub_field( 'content' ); ?></p>
  <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
    <?php $button = get_sub_field( 'button' ); ?>
    <?php if ( $button ) : ?>
      <div class="w-fit self-start">
        <a class="btn mt-6 lg:mt-8 2xl:mt-12 <?php echo $button_style; ?>" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
          <?php echo esc_html( $button['title'] ); ?>
        </a>
      </div>
    <?php endif; ?>
  <?php endif; ?>
</div>