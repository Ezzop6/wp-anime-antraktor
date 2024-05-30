<h3>Required vars</h3>


<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  ApiKodiVariables::$kodi_user = $_POST['kodi_user'];
  ApiKodiVariables::$kodi_pass = $_POST['kodi_pass'];
  ApiKodiVariables::$kodi_port = $_POST['kodi_port'];
  ApiKodiVariables::$kodi_host = $_POST['kodi_host'];
  AntraktorVariableManager::set_variable(ApiKodiVariables::$db_key_kodi_user, ApiKodiVariables::$kodi_user);
  AntraktorVariableManager::set_variable(ApiKodiVariables::$db_key_kodi_pass, ApiKodiVariables::$kodi_pass);
  AntraktorVariableManager::set_variable(ApiKodiVariables::$db_key_kodi_port, ApiKodiVariables::$kodi_port);
  AntraktorVariableManager::set_variable(ApiKodiVariables::$db_key_kodi_host, ApiKodiVariables::$kodi_host);

  ApiKodiVariables::init();
  echo 'Saved';
} ?>


<form method="post">
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
