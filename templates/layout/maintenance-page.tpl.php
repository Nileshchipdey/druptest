<?php
/**
 * @file
 * Maintenance page.
 */
?>
<!DOCTYPE HTML>
<html class="no-js">
  <head>
    <?= $head; ?>
    <title><?= variable_get('site_name') ?></title>
    <?= $styles; ?>
    <meta name="viewport" content="initial-scale=1">
  </head>
  <body class="maintenance-page">
    <div class="maintenance-message">
      <h1></h1>
      <?= $content; ?>
    </div>
    <?= $scripts; ?>
  </body>
</html>
