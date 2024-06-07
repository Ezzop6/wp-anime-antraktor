<?php

function draw_episode_box($index, $progress) {
  $index++;
  return <<<HTML
  <div class="episode_progress_bar_bg">
    <div class="episode_progress_bar_inner" style="width: $progress%;"></div>
    <span>$index</span>
  </div>
  HTML;
}


function draw_series_progress_container($atts = array()) {
  $season_id = $atts['season_id'];
  $episode_count = random_int(0, 50);
  $episode_count = array_fill(0, $episode_count, random_int(0, 100));
  $episode_boxes = '';
  foreach ($episode_count as  $index => $progress) {
    $episode_boxes .= draw_episode_box($index, $progress);
  }
  return <<<HTML
    <div class="series_season_progress_bar">
      $episode_boxes
    </div>
  HTML;
}
