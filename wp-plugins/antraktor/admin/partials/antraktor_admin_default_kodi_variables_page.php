<h3>Kodi Variables</h3>


<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'kodi') {
  ApiKodiVariables::$kodi_user = htmlspecialchars($_POST['kodi_user']);
  ApiKodiVariables::$kodi_pass = htmlspecialchars($_POST['kodi_pass']);
  ApiKodiVariables::$kodi_port = htmlspecialchars($_POST['kodi_port']);
  ApiKodiVariables::$kodi_host = htmlspecialchars($_POST['kodi_host']);
  AntraktorVariableManager::set_variable(ApiKodiVariables::$db_key_kodi_user, ApiKodiVariables::$kodi_user);
  AntraktorVariableManager::set_variable(ApiKodiVariables::$db_key_kodi_pass, ApiKodiVariables::$kodi_pass);
  AntraktorVariableManager::set_variable(ApiKodiVariables::$db_key_kodi_port, ApiKodiVariables::$kodi_port);
  AntraktorVariableManager::set_variable(ApiKodiVariables::$db_key_kodi_host, ApiKodiVariables::$kodi_host);
} else {
  ApiKodiVariables::init();
} ?>


<form method="post">
  <input type="hidden" name="form_type" value="kodi" />
  <label for='<?php echo ApiKodiVariables::$db_key_kodi_user; ?>'>Kodi user</label>
  <input type="text" name="kodi_user" value="<?php echo ApiKodiVariables::$kodi_user; ?>" />
  <br />
  <label for='<?php echo ApiKodiVariables::$db_key_kodi_pass; ?>'>Kodi pass</label>
  <input type="password" name="kodi_pass" value="<?php echo ApiKodiVariables::$kodi_pass; ?>" />
  <br />
  <label for='<?php echo ApiKodiVariables::$db_key_kodi_port; ?>'>Kodi port</label>
  <input type="text" name="kodi_port" value="<?php echo ApiKodiVariables::$kodi_port; ?>" />
  <br />
  <label for='<?php echo ApiKodiVariables::$db_key_kodi_host; ?>'>Kodi host</label>
  <input type="text" name="kodi_host" value="<?php echo ApiKodiVariables::$kodi_host; ?>" />
  <br />
  <input type="submit" value="Save" />

</form>

<?php
?>
