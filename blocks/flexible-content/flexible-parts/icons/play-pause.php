<button class="relative text-white"  onclick="playPause('<?php echo $video_id; ?>')">
  <span id="play-icon-<?php echo $video_id; ?>" style="display: none;">
    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 36 36" width="36" height="36" class="fill-white">
      <path d="M18,0C8.1,0,0,8.1,0,18s8.1,18,18,18,18-8.1,18-18S27.9,0,18,0ZM18,33c-8.3,0-15-6.7-15-15S9.7,3,18,3s15,6.7,15,15-6.7,15-15,15Z"/>
      <polygon points="12.8 9.7 27.2 18 12.8 26.3 12.8 9.7"/>
    </svg>
  </span> 
  <span id="pause-icon-<?php echo $video_id; ?>">
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 36 36" width="36" height="36" class="fill-white"> 
      <path d="M18,0C8.1,0,0,8.1,0,18s8.1,18,18,18,18-8.1,18-18S27.9,0,18,0ZM18,33c-8.3,0-15-6.7-15-15S9.7,3,18,3s15,6.7,15,15-6.7,15-15,15Z"/>
      <g>
        <rect x="11.9" y="9.6" width="3.8" height="16.8"/>
        <rect x="20.3" y="9.6" width="3.8" height="16.8"/>
      </g>
    </svg>
  </span> 
</button>

<script>
  function playPause(videoId) {
    var myVideo = document.getElementById(videoId);
    var playIcon = document.getElementById('play-icon-' + videoId);
    var pauseIcon = document.getElementById('pause-icon-' + videoId);

    if (myVideo.paused) {
      myVideo.play();
      playIcon.style.display = "none";
      pauseIcon.style.display = "block";
    } else {
      myVideo.pause();
      playIcon.style.display = "block";
      pauseIcon.style.display = "none";
    }
  }
</script>