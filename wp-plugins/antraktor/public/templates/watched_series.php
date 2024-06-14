<?php

$watched_series = AntraktorKodiManager::get_all_valid_with_status('episode');

$html = '';
foreach ($watched_series as $object) {
  if (!$object->tmdb_data) {
    continue;
  }
  $series_data = AntraktorKodiManager::get_series_details($object->record_key);
  $poster = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $series_data->poster_path, 'series', $series_data->name, 300);
  $progress_bar = do_shortcode("[draw_series_progress_container series_id='$series_data->id']");
  $next_episode_data = $series_data->next_episode_to_air;
  $next_episode_to_air = <<<HTML
    <div class="next_episode_to_air">
      <h5>$next_episode_data->name</h5>
      <p>$next_episode_data->overview</p>
      <p>$next_episode_data->vote_average</p>
      <p>$next_episode_data->vote_count</p>
      <p>$next_episode_data->air_date</p>
      <p>$next_episode_data->episode_number</p>
      <p>$next_episode_data->episode_type</p>
      <p>$next_episode_data->production_code</p>
      <p>$next_episode_data->runtime</p>
    </div>
    HTML;
  $html .= <<<HTML
    <div class="watched_serie">
      <div class="left">
        $poster
      </div>
      <div class="right">
        <h3>$series_data->name</h3>
        <p>Episode count: $series_data->number_of_episodes</p>
        <p>Season count: $series_data->number_of_seasons</p>
        <p>Status: $series_data->status</p>
        <p>Overview: $series_data->overview</p>
        <p>First air date: $series_data->first_air_date</p>
        <a href="$series_data->homepage">Homepage</a>
        <a href="/antraktor/similar-series?series_id=$series_data->id">Similar series</a>
        <a href="/antraktor/series-info?series_id=$series_data->id">More info</a>
        <p>Votes: $series_data->vote_average ($series_data->vote_count)</p>
        $next_episode_to_air
        $progress_bar
        </div>
      </div>
    HTML;
}
?>
<section class="watched_series">
  <?php echo $html; ?>
</section>
