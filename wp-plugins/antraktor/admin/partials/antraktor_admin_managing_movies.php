<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['record_key']) && isset($_POST['new_watch_status'])) {

  $record_key = htmlspecialchars($_POST['record_key']);
  $new_status = htmlspecialchars($_POST['new_watch_status']);
  AntraktorKodiManager::change_status($record_key, $new_status);

  $watch_status = htmlspecialchars($_POST['change_selection']);
  $results = AntraktorKodiManager::get_all_valid_with_status('movie', $watch_status);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_selection']) && !isset($_POST['delete'])) {

  $watch_status = htmlspecialchars($_POST['change_selection']);
  $results = AntraktorKodiManager::get_all_valid_with_status('movie', $watch_status);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['record_key']) && isset($_POST['delete'])) {

  $record_key = htmlspecialchars($_POST['record_key']);
  AntraktorKodiManager::delete_record($record_key);

  $watch_status = htmlspecialchars($_POST['change_selection']);
  $results = AntraktorKodiManager::get_all_valid_with_status('movie', $watch_status);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_all_invalid'])) {

  AntraktorKodiManager::delete_all_invalid();
  $results = AntraktorKodiManager::get_all_valid_with_status('movie');
} else {
  $results = AntraktorKodiManager::get_all_valid_with_status('movie');
}

$form_delete_all_invalid = <<<HTML
  <form method="post">
    <input type="hidden" name="delete_all_invalid" value="true">
    <button type="submit">Delete all invalid</button>
  </form>
HTML;

$section_change_selection = '<section>';
foreach (ANTRAKTOR_KODI_WATCH_STATUSES as $status) {
  $section_change_selection .= <<<HTML
    <form method="post">
      <input type="hidden" name="change_selection" value="$status">
      <button type="submit">$status</button>
    </form>
HTML;
}


$section_change_selection .= $form_delete_all_invalid;


$section_change_selection .= '</section>';
echo $section_change_selection;

$section_shows_html = '<section>';
foreach ($results as $result) {
  $tmdb_data = AntraktorKodiManager::get_series_details($result->record_key);
  $tmdb_data_length = strlen($result->tmdb_data);
  $keys = $result->id_imdb || $result->id_tmdb || $result->id_tvdb;
  $is_valid = '<h3 style=' . ($keys ? '"color: green;"' : '"color: red;"') . '>' . $result->name . ' is ' . ($keys ? 'VALID' : 'INVALID') . '</h3>';
  $section_shows_html .= <<<HTML
    <div class="antraktor-show">
      $is_valid
      <h4>Status: $result->watch_status</h4>
      <b>TmDB data : $tmdb_data_length chars</b>
      <div>
        <button onclick="copyToClipboard('$result->record_key')">DB record $result->record_key</button>
        <p>$result->show_type</p>
        <button onclick="copyToClipboard('$result->tvdb_show_id')">TVDB show ID $result->tvdb_show_id</button>
        <button onclick="copyToClipboard('$result->id_imdb')">IMDB UNI KEY $result->id_imdb</button>
        <button onclick="copyToClipboard('$result->id_tmdb')">TMDB UNI KEY $result->id_tmdb</button>
        <button onclick="copyToClipboard('$result->id_tvdb')">TVDB UNI KEY $result->id_tvdb</button>
      </div>
      
    </div>
    
    <form method="post">
      <input type="hidden" name="record_key" value="$result->record_key">
      <input type="hidden" name="watch_status" value="$result->watch_status">
      <input type="hidden" name="change_selection" value="$status">
      <label for="watch_status">Change status</label>
      <select name="new_watch_status">
        <option value="not_started">not_started</option>
        <option value="watching">watching</option>
      </select>
      <button type="submit">Change status</button>
    </form>

    <form method="post">
      <input type="hidden" name="record_key" value="$result->record_key">
      <input type="hidden" name="change_selection" value="$status">
      <input type="hidden" name="delete" value="true">
      <button type="submit">Delete</button>
    </form>
HTML;
}
$section_shows_html .= '</section>';
echo $section_shows_html;
