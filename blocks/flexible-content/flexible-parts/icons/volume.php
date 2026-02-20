<button class="relative text-white" onclick="muteUnmute('<?php echo $video_id; ?>')">
    <span id="volume-high-icon-<?php echo $video_id; ?>" style="display: none;">
      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 36 36" width="36" height="36" class="fill-white">
        <polygon points="23.2 27 23.2 14.9 15.6 22.5 15.8 22.5 23.2 27"/>
        <polygon points="23.2 9 15.8 13.5 11.2 13.5 11.2 22.5 11.4 22.5 23.2 10.6 23.2 9"/>
        <path d="M18,0C8.1,0,0,8.1,0,18s8.1,18,18,18,18-8.1,18-18S27.9,0,18,0ZM18,33c-3.6,0-6.9-1.3-9.5-3.4l7.1-7.1h-4.2l-5,5c-2.1-2.6-3.4-5.9-3.4-9.5,0-8.3,6.7-15,15-15s6.9,1.3,9.5,3.4l-4.2,4.2v4.2l6.4-6.4c2.1,2.6,3.4,5.9,3.4,9.5,0,8.3-6.7,15-15,15Z"/>
      </svg>
    </span>
    <span id="volume-off-icon-<?php echo $video_id; ?>">
      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 36 36" width="36" height="36" class="fill-white">
        <path d="M18,0C8.1,0,0,8.1,0,18s8.1,18,18,18,18-8.1,18-18S27.9,0,18,0ZM18,33c-8.3,0-15-6.7-15-15S9.7,3,18,3s15,6.7,15,15-6.7,15-15,15Z"/>
        <polygon points="11.3 13.5 11.3 22.5 15.8 22.5 23.2 27 23.2 9 15.8 13.5 11.3 13.5"/>
      </svg>
    </span>
</button>

<script>
  function muteUnmute(videoId) {
    var myVideo = document.getElementById(videoId);
    var volumeOn = document.getElementById('volume-high-icon-' + videoId);
    var volumeOff = document.getElementById('volume-off-icon-' + videoId);

    if (myVideo.muted) {
      myVideo.muted = false;
      volumeOn.style.display = "block";
      volumeOff.style.display = "none";
    } else {
      myVideo.muted = true;
      volumeOn.style.display = "none";
      volumeOff.style.display = "block";
    }
  }
</script>