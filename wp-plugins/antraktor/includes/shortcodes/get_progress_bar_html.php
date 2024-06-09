<?php
function get_progress_bar_html($atts = array()) {
  $timeout = $atts['timeout'] ?? 5000;
  $kodi_data = AF::get_kodi_now_playing();
  return <<<HTML

<section class="antrakt-currently-playing-progress" style="background-image: url($kodi_data->art_banner); background-size: cover;">
  <div class="show_name">$kodi_data->movie_name</div>
  <div class="current-time"></div>
  <div class="progress-bar-background">
    <div class="progress-bar"></div>
  </div>
</section>

<script>
function formatTime(time) {
  let timeString = '';
  timeString += String(time.hours).padStart(2, '0') + ':';
  timeString += String(time.minutes).padStart(2, '0') + ':';
  timeString += String(time.seconds).padStart(2, '0');
  return timeString;
}
function fetchData() {
    fetch('/wp-json/antraktor/v1/now-playing/')
      .then(response => response.json())
      .then(data => {
        const progress = JSON.parse(data).result.percentage;
        const time = JSON.parse(data).result.time;
        const timeElement = document.querySelector('.antrakt-currently-playing-progress .current-time');
        const progressBar = document.querySelector('.antrakt-currently-playing-progress .progress-bar');
        progressBar.style.width = progress + '%';
        timeElement.textContent = formatTime(time);
      })
      .catch(error => console.error('Error fetching data:', error));
  }
  setInterval(fetchData, $timeout);
</script> 
HTML;
}
