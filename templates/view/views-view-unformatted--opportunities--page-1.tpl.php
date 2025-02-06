<?php
/**
 * @file
 * Opportunities page views rows.
 */
?>
<?= (!empty($title)) ? $title : ''; ?>
<?php foreach ($rows as $id => $row): ?>
  <?= $row; ?>
<?php endforeach; ?>
