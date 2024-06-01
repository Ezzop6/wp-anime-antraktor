<?php
function get_progress_bar_html($atts = array()) {
  $timeout = $atts['timeout'] ?? 5000;
  return <<<HTML

<div class="antrakt-currently-playing-progress">
  <div class="current-time"></div>
  <div class="progress-bar-background">
    <div class="progress-bar"></div>
  </div>
</div>

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
