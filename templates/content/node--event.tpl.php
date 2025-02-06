<?php
/**
 * @file
 * Event node.
 */
?>
<article class="<?= $node->type; ?>" id="<?= $node->nid; ?>">
  <?= (isset($content['field_tags'])) ? render($content['field_tags']) : ''; ?>
  <div class="content">
    <h3><?= (isset($content['field_title'])) ? $content['field_title']['#items'][0]['value'] : $title; ?></h3>
    <?php if (isset($content['field_dates']) || isset($content['field_event_location'])) : ?>
      <p class="details">
        <?= (isset($content['field_dates'])) ? render($content['field_dates']) : ''; ?>
        <?= (isset($content['field_event_location'])) ? render($content['field_event_location']) : ''; ?>
      </p>
    <?php endif; ?>
    <?= (isset($content['body'])) ? render($content['body']) : ''; ?>
    <?= (isset($content['field_video'])) ? render($content['field_video']) : ''; ?>
    <div class="links">
      <?= l(
        t('<i class="fas fa-envelope"></i> Email me about this program'),
        'mailto:argo@stryker.com?subject=' . ((isset($content['field_title'])) ? $content['field_title']['#items'][0]['value'] : $title),
        ['attributes' => ['class' => ['email'], 'target' => '_blank'], 'html' => TRUE]
      ); ?>
      <?= (isset($content['field_attachment'])) ? render($content['field_attachment']) : ''; ?>
      <?= (isset($content['field_podcast'])) ? render($content['field_podcast']) : ''; ?>
      <?= (isset($content['field_past_event'])) ? render($content['field_past_event']) : ''; ?>
    </div>
  </div>
</article>
