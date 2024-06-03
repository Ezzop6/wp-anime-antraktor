<h3>Spotify Variables</h3>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'spotify') {
  ApiSpotifyVariables::$spotify_client_id = htmlspecialchars($_POST['spotify_client_id']);
  ApiSpotifyVariables::$spotify_client_secret = htmlspecialchars($_POST['spotify_client_secret']);
  AntraktorVariableManager::set_variable(ApiSpotifyVariables::$db_key_spotify_client_id, ApiSpotifyVariables::$spotify_client_id);
  AntraktorVariableManager::set_variable(ApiSpotifyVariables::$db_key_spotify_client_secret, ApiSpotifyVariables::$spotify_client_secret);
} else {
  ApiSpotifyVariables::init();
} ?>


<form method="post">
  <input type="hidden" name="form_type" value="spotify" />
  <br />
  <label for='<?php echo ApiSpotifyVariables::$db_key_spotify_client_id; ?>'>Spotify client id</label>
  <input type="text" name="spotify_client_id" value="<?php echo ApiSpotifyVariables::$spotify_client_id; ?>" />
  <br />
  <label for='<?php echo ApiSpotifyVariables::$db_key_spotify_client_secret; ?>'>Spotify client secret</label>
  <input type="password" name="spotify_client_secret" value="<?php echo ApiSpotifyVariables::$spotify_client_secret; ?>" />
  <br />
  <input type="submit" value="Save" />
  <?php if (ApiSpotifyVariables::check_token_validaty()) {
    echo 'Token is valid';
  } else {
    echo 'Token is invalid';
  }
  ?>
</form>
