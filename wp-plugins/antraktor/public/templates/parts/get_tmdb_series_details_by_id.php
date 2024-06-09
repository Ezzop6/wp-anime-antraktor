<?php
$adult = $series_data->adult;
$backdrop_path =  $series_data->backdrop_path;
$created_by = $series_data->created_by;
$episode_run_time = $series_data->episode_run_time;
$first_air_date = $series_data->first_air_date;
$genres = $series_data->genres;
$homepage = $series_data->homepage;
$id = $series_data->id;
$in_production = $series_data->in_production;
$languages = $series_data->languages;
$last_air_date = $series_data->last_air_date;
$last_episode_to_air = $series_data->last_episode_to_air;
$name = $series_data->name;
$next_episode_to_air = $series_data->next_episode_to_air;
$networks = $series_data->networks;
$number_of_episodes = $series_data->number_of_episodes;
$number_of_seasons = $series_data->number_of_seasons;
$origin_country = $series_data->origin_country;
$original_language = $series_data->original_language;
$original_name = $series_data->original_name;
$overview = $series_data->overview;
$popularity = $series_data->popularity;
$poster_path = $series_data->poster_path;
$production_companies = $series_data->production_companies;
$production_countries = $series_data->production_countries;
$seasons = $series_data->seasons;
$spoken_languages = $series_data->spoken_languages;
$status = $series_data->status;
$tagline = $series_data->tagline;
$type = $series_data->type;
$vote_average = $series_data->vote_average;
$vote_count = $series_data->vote_count;


$poster_img = '';
$backdrop_img = '';
$last_episode_img = '';
if ($poster_path !== null && $name) {
  $poster_img = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $poster_path, 'poster', $name);
}
if ($backdrop_path !== null && $name) {
  $backdrop_img = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $backdrop_path, 'backdrop', $name);
}
if ($last_episode_to_air->still_path !== null && $name) {
  $last_episode_img = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $last_episode_to_air->still_path, 'last_episode', $name);
}
$last_episode_htl = <<<HTML
  <h3>Last episode name: $last_episode_to_air->name</h3>
  <p>Id: $last_episode_to_air->id</p>
  <p>Overview: $last_episode_to_air->overview</p>
  <p>Vote average: $last_episode_to_air->vote_average</p>
  <p>Vote count: $last_episode_to_air->vote_count</p>
  <p>Air date: $last_episode_to_air->air_date</p>
  <p>Episode number: $last_episode_to_air->episode_number</p>
  <p>Episode type: $last_episode_to_air->episode_type</p>
  <p>Production code: $last_episode_to_air->production_code</p>
  <p>Runtime: $last_episode_to_air->runtime</p>
  <p>Season number: $last_episode_to_air->season_number</p>
  <p>Show id: $last_episode_to_air->show_id</p>
  $last_episode_img
  HTML;
echo $last_episode_htl;

$next_episode_img = '';
if ($next_episode_to_air->still_path !== null && $name) {
  $next_episode_img = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $next_episode_to_air->still_path, 'next_episode', $name);
}
$next_episode_htl = <<<HTML
  <h3>Next episode name: $next_episode_to_air->name</h3>
  <p>Id: $next_episode_to_air->id</p>
  <p>Overview: $next_episode_to_air->overview</p>
  <p>Vote average: $next_episode_to_air->vote_average</p>
  <p>Vote count: $next_episode_to_air->vote_count</p>
  <p>Air date: $next_episode_to_air->air_date</p>
  <p>Episode number: $next_episode_to_air->episode_number</p>
  <p>Episode type: $next_episode_to_air->episode_type</p>
  <p>Production code: $next_episode_to_air->production_code</p>
  <p>Runtime: $next_episode_to_air->runtime</p>
  <p>Season number: $next_episode_to_air->season_number</p>
  <p>Show id: $next_episode_to_air->show_id</p>
  $next_episode_img
  HTML;
echo $next_episode_htl;


$seasons_html = '';
echo '<h3>Seasons</h3>';
foreach ($seasons->seasons as $season) {
  $season_poster_path = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $season->poster_path, 'season', $name);
  $season_html = <<<HTML
    <h3>Season name: $season->name</h3>
    <p>Air date: $season->air_date</p>
    <p>Episode count: $season->episode_count</p>
    <p>Id: $season->id</p>
    <p>Overview: $season->overview</p>
    <p>Season number: $season->season_number</p>
    <p>Vote average: $season->vote_average</p>
    $season_poster_path
    HTML;
  $seasons_html .= $season_html;
}
echo $seasons_html;

echo '<h3>Genres</h3>';

$genres_html = '';
foreach ($genres->genres as $genre) {
  $genres_html .= <<<HTML
    <p>Genre name: $genre->name</p>
    <p>Id: $genre->id</p>
    HTML;
}
echo $genres_html;


// <p>Episode run time: $episode_run_time</p> this is array
echo '<h3>Episode run time</h3>';
$episode_run_time_html = '';
foreach ($episode_run_time as $time) {
  $episode_run_time_html .= <<<HTML
    <p>Episode run time: $time</p>
    HTML;
}
echo $episode_run_time_html;
// <p>Languages: $languages</p> this is array
echo '<h3>Languages</h3>';
$languages_html = '';
foreach ($languages as $language) {
  $languages_html .= <<<HTML
    <p>Language: $language</p>
    HTML;
}
echo $languages_html;
// <p>Origin country: $origin_country</p> this is array
echo '<h3>Origin country</h3>';
$origin_country_html = '';
foreach ($origin_country as $country) {
  $origin_country_html .= <<<HTML
    <p>Country: $country</p>
    HTML;
}
echo $origin_country_html;
// <p>Production companies: $production_companies</p> this is array
echo '<h3>Production companies</h3>';
$production_companies_html = '';
foreach ($production_companies->production_companies as $company) {
  $production_companies_html .= <<<HTML
    <h3>Company name: $company->name</h3>
    <p>Id: $company->id</p>
    <p>Logo path: $company->logo_path</p>
    <p>Origin country: $company->origin_country</p>
    HTML;
}
echo $production_companies_html;
// <p>Networks: $networks</p> this is array
echo '<h3>Networks</h3>';
$networks_html = '';
foreach ($networks as $network) {
  $networks_html .= <<<HTML
    <p>Network name: $network->name</p>
    <p>Id: $network->id</p>
    HTML;
}
// <p>Production countries: $production_countries</p> this is array
echo '<h3>Production countries</h3>';
$production_countries_html = '';
foreach ($production_countries->production_countries as $country) {
  $production_countries_html .= <<<HTML
    <p>Country name: $country->name</p>
    <p>Id: $country->iso_3166_1</p>
    HTML;
}
echo $production_countries_html;
// <p>Spoken languages: $spoken_languages</p> this is array

echo '<h3>Spoken languages</h3>';
$spoken_languages_html = '';
foreach ($spoken_languages as $language) {
  $spoken_languages_html .= <<<HTML
    <p>Language name: $language->name</p>
    <p>Id: $language->iso_639_1</p>
    HTML;
}
echo $spoken_languages_html;
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
