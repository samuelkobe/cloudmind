<?php $aspect_ratio = get_sub_field( 'image_aspect_ratio' ); ?>
<?php $video_id = 'video-' . bin2hex(random_bytes(8)) ; ?>

<?php if ( get_sub_field( 'media_type' ) == 1 ) : ?>

  <div class="w-full" data-media-padding="true">
    <?php $image = get_sub_field( 'image' ); ?>
    <?php if ( $image ) : ?>
      <img class="w-full object-cover aspect-<?php echo $aspect_ratio;?> " src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
    <?php endif; ?>
  </div>

<?php else : ?>

  <div class="w-full" data-media-padding="true">
    <?php if ( get_sub_field( 'video_source' ) == 1 ) : ?>

      <div class="w-full aspect-<?php echo $aspect_ratio;?> relative">
        <?php 
          if ( get_sub_field( 'video_file' ) ) :
            $video = get_sub_field( 'video_file' );
            $video_element = '<video
                                id="' . $video_id . '"
                                class="absolute top-0 left-0 w-full h-full object-cover"
                                preload="metadata"
                                muted
                                autoplay
                                loop
                                playsinline
                                src="' . $video . '"
                                type="video/mp4">
                                Sorry, your browser doesn\'t support embedded videos.
                              </video>';
          endif; ?>
        <?php echo $video_element;?>

        <?php // the video controls if they are required ?>
        <div class="absolute right-3 bottom-3 z-1 flex space-x-2">
          <?php if ( get_sub_field( 'video_controls_toggle' ) == 1 ) : ?>
              <?php include( 'icons/play-pause.php' ); ?>
              <?php include( 'icons/volume.php' ); ?>
          <?php endif; ?>
        </div>
      </div>

    <?php else :
      $yt_video_id = get_sub_field( 'video_id' );
			$yt_video_title = get_sub_field( 'video_embed_title' );
			$video_embed_thumbnail = get_sub_field( 'video_embed_thumbnail' );
			if ( $video_embed_thumbnail ) :
				$yt_video_thumbnail_url = $video_embed_thumbnail['url'];
			endif;
    ?>

      <div class="w-full">
        <div class="video-embed" data-video-padding="true">
            <lite-youtube videoid="<?php echo $yt_video_id ?>" style="background-image: url('<?php echo $yt_video_thumbnail_url; ?>');" playlabel="<?php echo $yt_video_title; ?>"></lite-youtube>
        </div>
      </div>

    <?php endif; ?>
  </div>
  
<?php endif; ?>