<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(ANTRAKTOR_BODY_CLASS); ?>>
  <?php wp_body_open(); ?>
  <div class="antraktor_header">
    <nav class="nav">
      <ul class="nav_items">
        <li class="links"><a href="/">Back to homepage</a></li>
        <li class="links"><a href="/antraktor/now-playing">Now Playing</a></li>
        <li class="links"><a href="/antraktor/watched-series">Watched Series</a></li>
        <li class="links"><a href="/antraktor/watched-movies">Watched Movies</a></li>
        <li class="links"><a href="/antraktor/find-movie">Find Movie</a></li>
      </ul>
    </nav>
  </div>
