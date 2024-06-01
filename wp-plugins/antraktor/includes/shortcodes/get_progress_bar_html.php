<?php
function get_progress_bar_html($atts = array()) {
  $timeout = $atts['timeout'] ?? 5000;
  return <<<HTML

<div class="antrakt-progress">
  <div class="antrakt-progress-bar"></div>
</div>

<script>
function fetchData() {
    fetch('/wp-json/antraktor/v1/now-playing/')
      .then(response => response.json())
      .then(data => {
        const progress = JSON.parse(data).result.percentage;
        const progressBar = document.querySelector('.antrakt-progress-bar');
        progressBar.style.width = progress + '%';
      })
      .catch(error => console.error('Error fetching data:', error));
  }
  setInterval(fetchData, $timeout);
</script> 
HTML;
}
