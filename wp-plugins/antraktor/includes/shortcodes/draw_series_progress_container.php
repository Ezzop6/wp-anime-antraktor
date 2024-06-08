<?php

function draw_episode_box($episode_data, $season_id) {
  $episode_count = $episode_data->episode_count;
  $episode_box = '';

  for ($i = 0; $i < $episode_count; $i++) {
    $data = AntraktorEpisodeManager::get_record($season_id, $episode_data->season_number, $i + 1);
    $progress = $data->watch_progress ?? 0;
    $serie_number = $i + 1;
    $watch_status = match ($data->watch_status ?? 'default') {
      'watching' => 'blue',
      'watched' => 'green',
      default => 'gray',
    };
    $url_parts = '?series_id=' . $season_id;
    $url_parts .= '&season_number=' . $episode_data->season_number;
    $url_parts .= '&episode_number=' . $serie_number;
    $episode_box .= <<<HTML
      <div class="episode_progress_bar">
        <a href="/antraktor/episode-info/$url_parts">
        <div class="episode_progress" style="height: $progress%; opacity: $progress%; background-color: $watch_status;"></div>
        <div class="episode_number">$serie_number</div>
        </a>
      </div>
    HTML;
  }
  return <<<HTML
      $episode_box
    HTML;
}


function draw_series_progress_container($atts = array()) {
  $season_id = $atts['series_id'];
  $series_data = AntraktorSeasonManager::get_series_season_details($season_id);

  $episode_boxes = '';
  foreach ($series_data as $progress) {
    $episode_boxes .= "<div class='series_progress_bar'>" . draw_episode_box($progress, $season_id) . "</div>";
  }
  return <<<HTML
    <div class="series_progress_bars">
      $episode_boxes
    </div>
    HTML;
}
