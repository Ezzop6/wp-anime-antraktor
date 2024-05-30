<?php
$db_manager = new AntraktorVariableManager();

$keys = $db_manager->get_key_pairs();

?>

<?php

if (isset($_POST['Create_pages'])) {
  echo 'Creating pages...';
  AntraktorPageCreator::create_all_pages();
  echo 'Pages created!';
}
if (isset($_POST['get_page_meta_id'])) {
  $pages = AntraktorPageManager::get_pages_meta_ids();
  echo '<pre>';
  print_r($pages);
  echo '</pre>';
}
if (isset($_POST['delete_all'])) {
  AntraktorPageCreator::delete_all_pages();
  echo 'All pages deleted!';
}
?>

<?php

$api = do_shortcode('[antraktor_show_api_data api_target=kodi api_query_name=' . QueryKodi::$currently_playing . ']');
// echo json_decode($api);
$data = ApiDataParser::parse_kodi_data($api, QueryKodi::$currently_playing);
echo '<pre>';
// print_r($data);
// var_dump($data);
// if ($data === false) {
//   echo 'No data';
//   return;
// } else {
//   echo 'Data found';
//   $file = $data->result->item->file;
//   echo "File: $file\n";

//   $label = $data->result->item->label;
//   echo "Label: $label\n";

//   $videoCodec = $data->result->item->streamdetails->video[0]->codec;
//   echo "Video Codec: $videoCodec\n";

//   echo '<pre>';
// }

?>


</div>
<form method="post">
  <input type="submit" name="Create_pages" value="Create pages">
</form>

<form method="post">
  <input type="submit" name="get_page_meta_id" value="Get page meta id">
</form>

<form method="post">
  <input type="submit" name="delete_all" value="Delete all pages">
</form>
