<h3>Anilist Variables</h3>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'anilist') {
  ApiAnilistVariables::$client_id = htmlspecialchars($_POST['anilist_client_id']);
  ApiAnilistVariables::$client_secret = htmlspecialchars($_POST['anilist_client_secret']);
  ApiAnilistVariables::$client_acc_token = htmlspecialchars($_POST['anilist_client_acc_token']);
  ApiAnilistVariables::$client_auth_token = htmlspecialchars($_POST['anilist_client_auth_token']);
  AntraktorVariableManager::set_variable(ApiAnilistVariables::$db_key_id, ApiAnilistVariables::$client_id);
  AntraktorVariableManager::set_variable(ApiAnilistVariables::$db_key_secret, ApiAnilistVariables::$client_secret);
  AntraktorVariableManager::set_variable(ApiAnilistVariables::$db_key_access_token, ApiAnilistVariables::$client_acc_token);
  AntraktorVariableManager::set_variable(ApiAnilistVariables::$db_key_auth_token, ApiAnilistVariables::$client_auth_token);
} else {
  ApiAnilistVariables::init();
} ?>

<form method="post">
  <input type="hidden" name="form_type" value="anilist" />
  <label for='<?php echo ApiAnilistVariables::$db_key_id; ?>'>Anilist client id</label>
  <input type="text" name="anilist_client_id" value="<?php echo ApiAnilistVariables::$client_id; ?>" />
  <br />
  <label for='<?php echo ApiAnilistVariables::$db_key_secret; ?>'>Anilist client secret</label>
  <input type="password" name="anilist_client_secret" value="<?php echo ApiAnilistVariables::$client_secret; ?>" />
  <br />
  <label for='<?php echo ApiAnilistVariables::$db_key_access_token; ?>'>Anilist client access token</label>
  <input type="password" name="anilist_client_acc_token" value="<?php echo ApiAnilistVariables::$client_acc_token; ?>" />
  <br />
  <label for='<?php echo ApiAnilistVariables::$db_key_auth_token; ?>'>Anilist client auth token</label>
  <input type="password" name="anilist_client_auth_token" value="<?php echo ApiAnilistVariables::$client_auth_token; ?>" />
  <br />
  <input type="submit" value="Save" />
</form>
