<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(ANTRAKTOR_BODY_CLASS); ?>>
  <?php wp_body_open(); ?>
  <div>
    <nav>
      <ul>
        <li><a href="/">Back to homepage</a></li>
        <li><a href="/antraktor/index">Antraktor</a></li>
        <li><a href="/antraktor/now-playing">Now Playing</a></li>
        <li><a href="/antraktor/find-movie">Find Movie</a></li>
      </ul>
    </nav>
  </div>
