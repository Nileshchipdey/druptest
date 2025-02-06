<?php
/**
 * @file
 * Video field.
 */
?>
<div class="video">
  <div class="video-wrapper-wrapper">
    <div class="video-wrapper">
      <iframe src="//player.vimeo.com/video/<?= $element['#object']->field_video['und'][0]['value']; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
    </div>
  </div>
  <?php if (
    isset($element['#object']->field_video_blurb) &&
    !empty($element['#object']->field_video_blurb)
  ) : ?>
    <div class="video-blurb">
      <?= check_markup($element['#object']->field_video_blurb['und'][0]['value'], $element['#object']->field_video_blurb['und'][0]['format']); ?>
    </div>
  <?php endif; ?>
</div>
