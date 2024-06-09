<?php


function get_currently_playing_html() {

  $playing = Af::get_kodi_status();
  if (!$playing) {
    $nothing_playing_html = <<<HTML
    <h3>Kodi is stopped</h3>
    HTML;
    return  $nothing_playing_html;
  }

  $now_playing = Af::get_kodi_now_playing();
  if (!$now_playing) {
    $nothing_playing_html = <<<HTML
    <h3>Kodi is on but nothing is playing</h3>
    HTML;
    return  $nothing_playing_html;
  }
  $progress_bar = do_shortcode('[get_progress_bar_html timeout=1000]');
  $show_type = $now_playing->type;
  $show_name = $now_playing->movie_name;
  $plot = $now_playing->plot;

  $img_art_fanart = ImageDownloader::get_image_div(ImageDownloader::$direct_link, $now_playing->art_fanart, 'art_fanart', $show_name);
  $img_art_clearlogo = ImageDownloader::get_image_div(ImageDownloader::$direct_link, $now_playing->art_clearlogo, 'art_clearlogo', $show_name);
  $img_thumbnail = ImageDownloader::get_image_div(ImageDownloader::$direct_link, $now_playing->thumbnail, 'thumbnail', $show_name);
  $img_art_poster = ImageDownloader::get_image_div(ImageDownloader::$direct_link, $now_playing->art_poster, 'art_poster', $show_name);
  $html = <<<HTML
  <section class="kodi_currently_playing">
    $progress_bar 
    <div class="playing_info">
      <h2>Show type: $show_type</h2>
      <h2>Show name: $show_name</h2>
      <p>$plot</p>
    </div>
    <div class="playing_images">
      $img_art_fanart
      $img_art_clearlogo
      $img_thumbnail
      $img_art_poster
    </div>
  </section>
  HTML;
  echo $html;
}
