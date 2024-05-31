<h2>Vars</h2>
<?php
$db_manager = new AntraktorVariableManager();

require_once plugin_dir_path(__FILE__) . 'antraktor_admin_default_kodi_variables_page.php';
require_once plugin_dir_path(__FILE__) . 'antraktor_admin_default_tmdb_variables_page.php';
require_once plugin_dir_path(__FILE__) . 'antraktor_admin_default_anilist_variables_page.php';

if (isset($_POST['update'])) {
  $db_manager->update_variable($_POST['key'], $_POST['value'], $_POST['id']);
}
if (isset($_POST['add_new'])) {
  $db_manager->add_variable($_POST['key'], $_POST['value']);
}
if (isset($_POST['delete'])) {
  $db_manager->delete_variable($_POST['id']);
}

$key_pairs = $db_manager->get_key_pairs();
$html_key_pairs = '';
foreach ($key_pairs as $pair) {
  $id = 'kay_pair_var_' . $pair->id;
  $key = $pair->var_name;
  $value = $pair->var_value;
  $html_key_pairs .= <<<HTML
    <div id=$id>
      <form method="post">
        <input type="hidden" name="id" value="$pair->id">
        <input type="text" name="key" value="$key">
        <input type="text" name="value" value="$value">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete" value="Delete">
      </form>
    </div>
HTML;
}
?>

<div>
  <h2>Add new key-value pair</h2>
  <form method="post">
    <input type="text" name="key" placeholder="Key">
    <input type="text" name="value" placeholder="Value">
    <input type="submit" name="add_new" value="Add ">
  </form>
</div>

<?php if ($html_key_pairs) {
  echo '<h2>Current key-value pairs</h2>';
  echo $html_key_pairs;
} ?>
