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
$api = do_shortcode('[antraktor_show_api_data api_target=iss_tracking]');

echo '<pre>';
print_r(json_decode($api));
echo '</pre>';
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
