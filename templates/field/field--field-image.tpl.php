<?php
/**
 * @file
 * Image field.
 */
?>
<div class="image">
  <?php
    $picture_map     = ($element['#view_mode'] == 'full') ? 'news_large' : 'news_small';
    $picture_mapping = picture_mapping_load($picture_map);
    $breakpoints     = picture_get_mapping_breakpoints($picture_mapping);
    $rendered_image  = theme_picture([
      'breakpoints' => $breakpoints,
      'style_name'  => ($element['#view_mode'] == 'full') ? 'news_large_desktop_1x' : 'news_small_desktop_1x',
      'timestamp'   => NULL,
      'uri'         => $items[0]['#item']['uri'],
    ]);
  ?>
  <?= $rendered_image; ?>
</div>
