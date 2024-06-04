<?php
HelperScripts::print($series_data, false);
$adult = $series_data::$adult;
$backdrop_path =  $series_data::$backdrop_path;
$created_by = $series_data::$created_by;
$episode_run_time = $series_data::$episode_run_time;
$first_air_date = $series_data::$first_air_date;
$genres = $series_data::$genres;
$homepage = $series_data::$homepage;
$id = $series_data::$id;
$in_production = $series_data::$in_production;
$languages = $series_data::$languages;
$last_air_date = $series_data::$last_air_date;
$last_episode_to_air = $series_data::$last_episode_to_air;
$name = $series_data::$name;
$next_episode_to_air = $series_data::$next_episode_to_air;
$networks = $series_data::$networks;
$number_of_episodes = $series_data::$number_of_episodes;
$number_of_seasons = $series_data::$number_of_seasons;
$origin_country = $series_data::$origin_country;
$original_language = $series_data::$original_language;
$original_name = $series_data::$original_name;
$overview = $series_data::$overview;
$popularity = $series_data::$popularity;
$poster_path = $series_data::$poster_path;
$production_companies = $series_data::$production_companies;
$production_countries = $series_data::$production_countries;
$seasons = $series_data::$seasons;
$spoken_languages = $series_data::$spoken_languages;
$status = $series_data::$status;
$tagline = $series_data::$tagline;
$type = $series_data::$type;
$vote_average = $series_data::$vote_average;
$vote_count = $series_data::$vote_count;

$img_show = true;
if ($img_show) {
  echo '<h3>Images</h3>';
  echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_original, $backdrop_path, 'backdrop', $name);
  echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_original, $poster_path, 'poster', $name);
}

// <p>Last episode to air: $last_episode_to_air</p> this is object
// <p>Next episode to air: $next_episode_to_air</p> this is object
//  <p>Seasons: $seasons</p> this is object
// <p>Created by: $created_by</p> this is array
// <p>Genres: $genres</p> this is array
// <p>Episode run time: $episode_run_time</p> this is array
// <p>Languages: $languages</p> this is array
// <p>Origin country: $origin_country</p> this is array
// <p>Production companies: $production_companies</p> this is array
// <p>Networks: $networks</p> this is array
// <p>Production countries: $production_countries</p> this is array
// <p>Spoken languages: $spoken_languages</p> this is array

$series_data = <<<HTML
  <p>Adult: $adult</p>
  <p>Backdrop path: $backdrop_path</p>
  <p>First air date: $first_air_date</p>
  <p>Homepage: $homepage</p>
  <p>Id: $id</p>
  <p>In production: $in_production</p>
  <p>Last air date: $last_air_date</p>
  <p>Name: $name</p>
  <p>Number of episodes: $number_of_episodes</p>
  <p>Number of seasons: $number_of_seasons</p>
  <p>Original language: $original_language</p>
  <p>Original name: $original_name</p>
  <p>Overview: $overview</p>
  <p>Popularity: $popularity</p>
  <p>Poster path: $poster_path</p>
  <p>Status: $status</p>
  <p>Tagline: $tagline</p>
  <p>Type: $type</p>
  <p>Vote average: $vote_average</p>
  <p>Vote count: $vote_count</p>
  HTML;
echo $series_data;
