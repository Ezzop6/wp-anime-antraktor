<?php
echo '<h3>Movie name: ' . $movie_data::$title . '</h3>';

$adult = $movie_data::$adult;
$backdrop_path = $movie_data::$backdrop_path;
$belongs_to_collection = $movie_data::$belongs_to_collection;
$budget = $movie_data::$budget;
$genres = $movie_data::$genres;
$homepage = $movie_data::$homepage;
$id = $movie_data::$id;
$imdb_id = $movie_data::$imdb_id;
$origin_country = $movie_data::$origin_country;
$original_language = $movie_data::$original_language;
$original_title = $movie_data::$original_title;
$overview = $movie_data::$overview;
$popularity = $movie_data::$popularity;
$poster_path = $movie_data::$poster_path;
$production_companies = $movie_data::$production_companies;
$production_countries = $movie_data::$production_countries;
$release_date = $movie_data::$release_date;
$revenue = $movie_data::$revenue;
$runtime = $movie_data::$runtime;
$spoken_languages = $movie_data::$spoken_languages;
$status = $movie_data::$status;
$tagline = $movie_data::$tagline;
$title = $movie_data::$title;
$video = $movie_data::$video;
$vote_average = $movie_data::$vote_average;
$vote_count = $movie_data::$vote_count;

$imdb_link = 'https://www.imdb.com/title/' . $imdb_id;
$img_show = false;
if ($img_show) {
  echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_original, $backdrop_path, 'backdrop', $title);
  echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_original, $poster_path, 'poster', $title);
}
// <p>Belongs to collection: $belongs_to_collection</p> this is object
// <p>Genres: $genres</p> this is object
// <p>Production companies: $production_companies</p> this is object
// <p>Production countries: $production_countries</p> this is object
// <p>Spoken languages: $spoken_languages</p> this is object
// <p>Origin country: $origin_country</p> this is array

$tmdb_detail_data = <<<HTML
<h3>Tmdb Details Data</h3>
<a href="$imdb_link">ImDB link</a>
<p>Adult: $adult</p>
<p>Backdrop path: $backdrop_path</p>
<p>Budget: $budget</p>
<p>Homepage: $homepage</p>
<p>Id: $id</p>
<p>Imdb id: $imdb_id</p>
<p>Original language: $original_language</p>
<p>Original title: $original_title</p>
<p>Overview: $overview</p>
<p>Popularity: $popularity</p>
<p>Poster path: $poster_path</p>
<p>Release date: $release_date</p>
<p>Revenue: $revenue</p>
<p>Runtime: $runtime</p>
<p>Status: $status</p>
<p>Tagline: $tagline</p>
<p>Title: $title</p>
<p>Video: $video</p>
<p>Vote average: $vote_average</p>
<p>Vote count: $vote_count</p>
HTML;
echo $tmdb_detail_data;
