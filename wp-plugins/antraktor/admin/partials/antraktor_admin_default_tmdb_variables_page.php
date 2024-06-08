<h3>Tmdb Variables</h3>


<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'tmdb') {
  ApiTmdbVariables::$api_key = $_POST['tmdb_api_key'];
  ApiTmdbVariables::$access_token = $_POST['tmdb_access_token'];
  // AntraktorVariableManager::set_variable(ApiTmdbVariables::$db_key_api_key, ApiTmdbVariables::$api_key);
  AntraktorVariableManager::set_variable(ApiTmdbVariables::$db_key_access_token, ApiTmdbVariables::$access_token);
} else {
  ApiTmdbVariables::init();
} ?>


<form method="post">
  <input type="hidden" name="form_type" value="tmdb" />
  <br />
  <label for='<?php echo ApiTmdbVariables::$db_key_access_token; ?>'>Tmdb access token</label>
  <input type="password" name="tmdb_access_token" value="<?php echo ApiTmdbVariables::$access_token; ?>" />
  <br />
  <input type="submit" value="Save" />
</form>
