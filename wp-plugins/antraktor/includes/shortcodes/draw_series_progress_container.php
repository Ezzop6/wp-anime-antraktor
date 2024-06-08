<?php

function draw_episode_box($episode_data, $season_id) {
  $episode_count = $episode_data->episode_count;
  $tmdb_season_id = $episode_data->tmdb_season_id;
  $episode_box = '';

  for ($i = 0; $i < $episode_count; $i++) {
    $data = AntraktorEpisodeManager::get_record($season_id, $episode_data->season_number, $i + 1);
    $progress = $data->watch_progress ?? 0;
    $serie_number = $i + 1;
    $watch_status = $data->watch_status ?? 'unwatched';
    $episode_box .= <<<HTML
      <div class="episode_progress_bar">
        <a href="http://localhost:3000/series/$tmdb_season_id/episode/$i">
        <div class="episode_progress" style="height: $progress%"></div>
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
