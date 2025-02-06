<?php
/**
 * @file
 * Default node.
 */
?>
<article class="<?= $node->type; ?>">
  <h1><?= $title; ?></h1>
  <div class="content">
    <?= (isset($content['field_tags'])) ? render($content['field_tags']) : ''; ?>
    <?= (isset($content['body'])) ? render($content['body']) : ''; ?>
    <?= (isset($content['webform'])) ? render($content['webform']) : ''; ?>
  </div>
</article>
