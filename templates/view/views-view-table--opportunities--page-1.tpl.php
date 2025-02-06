<?php
/**
 * @file
 * Opportunities page views table.
 */
?>
<div class="table-wrapper">
  <table<?= ($classes) ? ' class="' . $classes . '"' : ''; ?><?= $attributes; ?>>
     <?php if (!empty($title) || !empty($caption)): ?>
       <caption><?= $caption . $title; ?></caption>
    <?php endif; ?>
    <?php if (!empty($header)) : ?>
      <thead>
        <tr>
          <?php foreach ($header as $field => $label) : ?>
            <th<?= ($header_classes[$field]) ? ' class="' . $header_classes[$field] . '"' : ''; ?> scope="col">
              <?= $label; ?>
            </th>
          <?php endforeach; ?>
        </tr>
      </thead>
    <?php endif; ?>
    <tbody>
      <?php foreach ($rows as $row_count => $row): ?>
        <tr <?= ($row_classes[$row_count]) ? ' class="' . implode(' ', $row_classes[$row_count]) . '"' : ''; ?>>
          <?php foreach ($row as $field => $content): ?>
            <td <?= ($field_classes[$field][$row_count]) ? ' class="' . $field_classes[$field][$row_count] . '"' : '' ?><?= drupal_attributes($field_attributes[$field][$row_count]); ?>>
              <div class="field-content">
                <?= $content; ?>
              </div>
            </td>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
