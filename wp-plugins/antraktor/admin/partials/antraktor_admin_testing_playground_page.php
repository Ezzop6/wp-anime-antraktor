
<?php


$data = AntraktorKodiManager::get_tmdb_data('92e7747fd3d09930669f50849c753244-8140');
$parsed_data = ApiDataParser::parse(
  QueryTmdb::class,
  $data,
  QueryTmdb::$get_series_details_by_id
);


$season_html = '';
foreach ($parsed_data->seasons->seasons as $season) {
  $poster = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $season->poster_path, 'season', $season->name, 300);
  $season_html .= <<<HTML
    <h3>Season name: $season->name</h3>
    <p>Air date: $season->air_date</p>
    <p>Episode count: $season->episode_count</p>
    <p>Id: $season->id</p>
    <p>Overview: $season->overview</p>
    <p>Poster path: $season->poster_path</p>
    <p>Season number: $season->season_number</p>
    <p>Vote average: $season->vote_average</p>
    $poster

  HTML;
}

$html = <<<HTML
<section>
  <p>Episode count: $parsed_data->number_of_episodes</p>
  <p>Season count: $parsed_data->number_of_seasons</p>
  <div>
    $season_html
  </div>
</section>
HTML;

echo $html;

HelperScripts::print($parsed_data);
echo gettype($parsed_data);
