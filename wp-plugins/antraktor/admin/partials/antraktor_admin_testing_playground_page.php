
<?php


require_once ANTRAKTOR_INCLUDES_DIR . 'api/class_antraktor_refresh_wp.php';
$result = AntraktorRefresh::refresh();
echo $result->data;
