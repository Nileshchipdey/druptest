<?php
/**
 * @file
 * Supervisor views field.
 */
?>
<?php foreach ($row->field_field_supervisor as $key => $supervisor) : ?>
  <?= ($key > 0) ? '<br>' : ''; ?>
  <span><?= $supervisor['raw']['value']; ?></span>
<?php endforeach; ?>
