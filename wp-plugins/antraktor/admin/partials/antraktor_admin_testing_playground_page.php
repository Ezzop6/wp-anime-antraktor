<?php
$client_id = ApiAnilistVariables::$client_id;
$client_secret = ApiAnilistVariables::$client_secret;
$redirect_uri = 'http://localhost:3500/anilist/callback';
$query = [
  'client_id' => $client_id,
  'redirect_uri' => $redirect_uri,
  'response_type' => 'code'
];


$url = 'https://anilist.co/api/v2/oauth/authorize?' . urldecode(http_build_query($query));

// ...
echo "<a href='$url'>Login with Anilist</a>";




// echo ApiCommunicator::send(
//   QueryAnilist::class,
//   QueryAnilist::$test
// );


// $data=  ApiCommunicator::send(
//   QuerySpotify::class,
//   QuerySpotify::$get_artist_by_name,
//   array('get_artist_by_name' => 'eminem')
// );

// HelperScripts::print($data );
// $currently_played_kodi_data = ApiCommunicator::send(
//   QueryKodi::class,
//   QueryKodi::$player_get_item
// );

// Here we define our query as a multi-line string
$query = '
query ($id: Int) { # Define which variables will be used in the query (id)
  Media (id: $id, type: ANIME) { # Insert our variables into the query arguments (id) (type: ANIME is hard-coded in the query)
    id
    title {
      romaji
      english
      native
    }
  }
}
';
$query = [
  'query' => [
    'Media' => [
      'id' => '$id',
      'type' => 'ANIME',
      'fields' => [
        'id',
        'title' => [
          'romaji',
          'english',
          'native'
        ]
      ]
    ]
  ]
];

function buildGraphQLQuery(array $parts, $depth = 0) {
  $output = '';
  foreach ($parts as $key => $value) {
    if (is_array($value)) {
      if (is_string($key)) {
        $output .= str_repeat('  ', $depth) . $key . ' {' . "\n";
        $output .= buildGraphQLQuery($value, $depth + 1);
        $output .= str_repeat('  ', $depth) . '}' . "\n";
      } else {
        $output .= buildGraphQLQuery($value, $depth);
      }
    } else {
      $output .= str_repeat('  ', $depth) . $value . "\n";
    }
  }
  return $output;
}

$id = 123;
$fullQuery = "query (\$id: Int) {\n" . buildGraphQLQuery($query['query']) . "}\n";

// Define our query variables and values that will be used in the query request
$variables = [
  "id" => 15125

];


$response = wp_remote_post(
  'https://graphql.anilist.co',
  array(
    'body' => json_encode([
      'query' => $fullQuery,
      'variables' => $variables
    ]),
    'headers' => array(
      'Content-Type' => 'application/json',
      'Accept' => 'application/json',
    ),
  )
);
$body = wp_remote_retrieve_body($response);
echo '<br>';
echo '<prev>';
var_dump($body);
echo '</prev>';


// Make the HTTP Api request
// $hash = md5(json_encode($currently_played_kodi_data)) . '-' . strlen(json_encode($currently_played_kodi_data));
// $created_record = AntraktorKodiManager::add_record($currently_played_kodi_data);


// $currently_played_parsed_data = ApiDataParser::parse(
//   QueryKodi::class,
//   $currently_played_kodi_data,
//   QueryKodi::$player_get_item
// );

// $type = $currently_played_parsed_data::$type;
// $name = $currently_played_parsed_data::$movie_name;


// echo $created_record ? 'Record added' : 'Record already exists';
// echo '<br>';
// echo $type;
// echo '<br>';
// echo 'Name: ' . $name;
// echo '<br>';
// echo 'Hash: ' . $hash;

// $tmdb_details_data = AF::get_tmdb_series_details_by_id('67198', false);

// helperScripts::print($tmdb_details_data);
