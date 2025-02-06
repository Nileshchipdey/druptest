<?php
/**
 * @file
 * Product downloads field.
 */
?>
<?php foreach ($items as $item) : ?>
  <tr class="download">
    <td>
      <?= (!empty($item['#file']->description)) ? $item['#file']->description : $item['#file']->filename; ?>
    </td>
    <td>
      <?= l('<i class="fas fa-download"></i>', file_create_url($item['#file']->uri), ['attributes' => ['target' => '_blank'], 'html' => TRUE]); ?>
    </td>
  </tr>
<?php endforeach; ?>
