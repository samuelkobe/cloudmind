<?php if ( have_rows( 'social_media_accounts' ) ) : ?>
  <div class="mt-4 lg:mt-8">
    <h3 class="text-dark font-sans font-medium text-base md:text-lg mb-2 lg:mb-4">Follow at:</h3>
    <ul class="flex flex-row space-x-4" role="navigation" aria-label="Social Media Navigation">
    <?php while ( have_rows( 'social_media_accounts' ) ) : the_row(); ?>
      <?php if ( get_sub_field( 'activate' ) == 1 ) : ?>
        <?php $icon = get_sub_field( 'icon' ); ?>
        <?php $icon_fill_color = get_sub_field( 'icon_fill_colour' ); ?>
        <?php $icon_size = get_sub_field( 'icon_size' ); ?>
        <li style="width: <?php echo $icon_size; ?>px; height: <?php echo $icon_size; ?>px;" class="list-none transition-transform scale-[.85] md:scale-100 hover:md:scale-110">
          <a href="<?php echo get_sub_field( 'url' ); ?>" name="Icon link to <?php echo get_sub_field( 'name' ); ?>" target="_blank">
            <?php if ( is_string( $icon ) ) : ?>
              <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" width="<?php echo $icon_size; ?>" height="<?php echo $icon_size; ?>" viewBox="0 0 24 24" fill="<?php echo $icon_fill_color; ?>">
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