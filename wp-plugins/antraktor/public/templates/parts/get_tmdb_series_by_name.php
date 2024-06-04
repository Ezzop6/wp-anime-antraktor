<h1>Series by name </h1>

<?php
echo '<h3>Series</h3>';
echo '<h3>Pages count: ' . $series_data->pages . '</h3>';
for ($i = 0; $i < count($series_data->seasons); $i++) {
  $adult = $series_data->seasons[$i]->adult;
  $backdrop_path = $series_data->seasons[$i]->backdrop_path;
  $genre_ids = $series_data->seasons[$i]->genre_ids; // this is array
  $id = $series_data->seasons[$i]->id;
  $origin_country = $series_data->seasons[$i]->origin_country; // this is array
  $original_language = $series_data->seasons[$i]->original_language;
  $overview = $series_data->seasons[$i]->overview;
  $original_name = $series_data->seasons[$i]->original_name;
  $popularity = $series_data->seasons[$i]->popularity;
  $poster_path = $series_data->seasons[$i]->poster_path;
  $first_air_date = $series_data->seasons[$i]->first_air_date;
  $name = $series_data->seasons[$i]->name;
  $vote_average = $series_data->seasons[$i]->vote_average;
  $vote_count = $series_data->seasons[$i]->vote_count;
  // <p>Origin country: $origin_country</p> // this is array
  foreach ($genre_ids as $genre_id) {
    echo '<p>Genre id: ' . $genre_id . '</p>';
  }
  foreach ($origin_country as $country) {
    echo '<p>Origin country: ' . $country . '</p>';
  }

  $tmdb_detail_data = <<<HTML
  <p>Adult: $adult</p>
  <p>Id: $id</p>
  <p>Original language: $original_language</p>
  <p>Original name: $original_name</p>
  <p>Overview: $overview</p>
  <p>Popularity: $popularity</p>
  <p>First air date: $first_air_date</p>
  <p>Name: $name</p>
  <p>Vote average: $vote_average</p>
  <p>Vote count: $vote_count</p>

  HTML;
  echo $tmdb_detail_data;
  echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $poster_path, 'poster', $name);
  echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $backdrop_path, 'backdrop', $name);
}
