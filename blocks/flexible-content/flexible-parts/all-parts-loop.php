<?php if ( get_row_layout() == 'flexible_editor' ) : ?>
  <?php include( 'flexible-editor.php' ); ?>
<?php elseif ( get_row_layout() == 'heading_and_content' ) : ?>
  <?php include( 'flexible-heading-and-content.php' ); ?>
<?php elseif ( get_row_layout() == 'heading_only' ) : ?>
  <?php include( 'flexible-heading-only.php' ); ?>
<?php elseif ( get_row_layout() == 'content_only' ) : ?>
  <?php include( 'flexible-content-only.php' ); ?>
<?php elseif ( get_row_layout() == 'media' ) : ?>
  <?php include( 'flexible-media.php' ); ?>
<?php elseif ( get_row_layout() == 'faqs' ) : ?>
  <?php include( 'flexible-faqs.php' ); ?>
<?php elseif ( get_row_layout() == 'social_media' ) : ?>
  <?php include( 'flexible-social-media.php' ); ?>
<?php elseif ( get_row_layout() == 'substack' ) : ?>
  <?php include( 'flexible-substack.php' ); ?>
<?php endif; ?>