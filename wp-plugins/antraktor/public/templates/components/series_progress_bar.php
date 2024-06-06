<?php
$data = AF::get_tmdb_series_details_by_id(127532, 1, 1);
$series_status = [];


$series_status  = [
  [10, 15, 55, 65, 0, 100],
  [15, 35, 1, 8, 87, 1, 25, 554, 15, 35, 1, 8, 87, 1, 25, 554, 15, 35, 1, 8, 87, 1, 25, 554],
];



$html = "";
$series_number = 0;
foreach ($series_status as $status) {
  $episode_number = 0;
  $series_number++;
  $html .= "<div class='season_container'>";
  foreach ($status as $progress) {
    $episode_number = $episode_number + 1;
    $progress = min(max($progress, 0), 99);
    $background_color_opacity = floatval($progress) / 100;
    $season_episode_container = <<<HTML
    <div class='episode_wrapper'>
      <div class='season_episode_number'>$episode_number</div>
      <div class='season_episode_container' style='height: $progress%; opacity: $background_color_opacity;'>
      </div>
    </div>
    HTML;
    $html .= $season_episode_container;
  }
  $html .= "</div>";
}


?>


<section class="series_progress_bar">
  <?php echo $html; ?>
</section>
