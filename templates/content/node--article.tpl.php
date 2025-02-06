<?php
/**
 * @file
 * Article node.
 */
?>
<article class="article">
  <h3><?= $title; ?></h3>
  <p class="date"><?= format_date($node->created, 'custom', 'j M, Y'); ?></p>
  <?= (isset($content['field_image'])) ? render($content['field_image']) : ''; ?>
  <?= (isset($content['body'])) ? render($content['body']) : ''; ?>
  <?php
    if (
      isset($content['field_external_link']) &&
      valid_url($content['field_external_link']['#items'][0]['value'], TRUE)
    ) :
  ?>
    <p class="external-link">
      <?=
        l(
          (($content['field_external_link_text']) ? $content['field_external_link_text']['#items'][0]['value'] : $content['field_external_link']['#items'][0]['value']),
          $content['field_external_link']['#items'][0]['value'],
          ['attributes' => ['target' => '_blank']]
        );
      ?>
    </p>
  <?php endif;?>
</article>
