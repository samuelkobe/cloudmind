<?php if ( have_rows( 'faq' ) ) : ?>
  <div class="faq-container w-full h-full mt-6 lg:mt-0">
    <?php while ( have_rows( 'faq' ) ) : the_row(); ?>
    <?php $faq_key = bin2hex(random_bytes(8)) ; ?>
      <div class="faq-item border-t-2 border-dark last:border-b-2 w-full">
        <h3 data-faq-key="<?php echo 'key-' . $faq_key; ?>" class="faq-question h-16 lg:h-24 flex items-center w-full font-semibold text-base lg:text-lg 2xl:text-xl lg:leading-6 2xl:leading-7">
          <button class="faq-toggle w-[92.5%] text-left flex flex-row items-center justify-between" aria-expanded="false" aria-controls="faq-answer-<?php the_row_index(); ?>">
            <?php echo get_sub_field( 'question' ); ?>
            <?php include( 'icons/faq-tab.php' ); ?>
          </button>
        </h3>
        <div data-faq-key="<?php echo 'key-' . $faq_key; ?>" class="faq-answer pt-0 pb-8 text-base lg:text-lg 2xl:text-xl lg:leading-8 2xl:leading-10" aria-hidden="true">
          <?php echo get_sub_field( 'answer' ); ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

<?php else : ?>
  <?php // No rows found ?>
<?php endif; ?>