<?php

try {
  echo do_shortcode('[get_currently_playing_html]');
} catch (Exception $e) {
  echo '<h3>Something went wrong:' . $e->getMessage() . '</h3>';
  echo '<h3>Nothing is playing right now</h3>';
}
