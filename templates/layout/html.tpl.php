<?php
/**
 * @file
 * HTML.
 */
?>
<!DOCTYPE HTML>
<html<?= $html_attributes; ?> class="no-js">
  <head>
    <?= $head; ?>
    <title><?= $head_title; ?></title>
    <?= $styles; ?>
    <?= $head_scripts; ?>
    <meta name="viewport" content="initial-scale=1">
  </head>
  <body<?= $body_attributes; ?>>
    <?= $page_top; ?>
    <div class="page-content">
      <div class="page-content-wrapper"
           data-body<?= trim($body_attributes); ?>
           data-headtitle="<?= $head_title; ?>">
        <?= $page; ?>
      </div>
    </div>
    <div class="page-transition-overlay"></div>
    <div class="page-transition-loading-bar"></div>
    <div class="page-transition-preloader"></div>
    <?= $scripts; ?>
    <?= $page_bottom; ?>
  </body>
</html>
