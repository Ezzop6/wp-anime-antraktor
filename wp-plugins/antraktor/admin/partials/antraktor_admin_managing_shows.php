<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['record_key']) && isset($_POST['new_watch_status'])) {
  $record_key = htmlspecialchars($_POST['record_key']);
  $new_status = htmlspecialchars($_POST['new_watch_status']);
  AntraktorKodiManager::change_status($record_key, $new_status);

  $watch_status = htmlspecialchars($_POST['change_selection']);
  $results = AntraktorKodiManager::get_all_valid_with_status($watch_status);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_selection']) && !isset($_POST['delete'])) {

  $watch_status = htmlspecialchars($_POST['change_selection']);
  $results = AntraktorKodiManager::get_all_valid_with_status($watch_status);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['record_key']) && isset($_POST['delete'])) {

  $record_key = htmlspecialchars($_POST['record_key']);
  AntraktorKodiManager::delete_record($record_key);

  $watch_status = htmlspecialchars($_POST['change_selection']);
  $results = AntraktorKodiManager::get_all_valid_with_status($watch_status);
} else {
  $results = AntraktorKodiManager::get_all_valid_with_status();
}

$section_change_selection = '<section>';
foreach (ANTRAKTOR_KODI_WATCH_STATUSES as $status) {
  $section_change_selection .= <<<HTML
    <form method="post">
      <input type="hidden" name="change_selection" value="$status">
      <button type="submit">$status</button>
    </form>
  HTML;
}
$section_change_selection .= '</section>';
echo $section_change_selection;

$section_shows_html = '<section>';
foreach ($results as $result) {
  $tmdb_data_length = strlen($result->tmdb_data);
  $section_shows_html .= <<<HTML
    <div class="antraktor-show">
      <h3>$result->name</h3>
      <h4>Status: $result->watch_status</h4>
      <p>KEY : $result->record_key</p>
      <p>TmDB data : $tmdb_data_length chars</p>
      <button onclick="copyToClipboard('$result->record_key')">
        Copy KEY
      </button>
      <div>
        <p>$result->show_type</p>
        <p>TvDB Show ID: $result->tvdb_show_id</p>
        <p>Unique ID imdb : $result->id_imdb</p>
        <p>Unique ID tmdb : $result->id_tmdb</p>
        <p>Unique ID tvdb : $result->id_tvdb</p>
      </div>
    </div>
    
    <form method="post">
      <input type="hidden" name="record_key" value="$result->record_key">
      <input type="hidden" name="watch_status" value="$result->watch_status">
      <input type="hidden" name="change_selection" value="$status">
      <label for="watch_status">Change status</label>
      <select name="new_watch_status">
        <option value="watched">watched</option>
        <option value="finished">finished</option>
        <option value="watching">watching</option>
        <option value="not_started">not_started</option>
        <option value="no_index">no index</option>
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
