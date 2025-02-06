<?php
/**
 * @file
 * Tags field.
 */
?>
<?php if (!empty($items)) : ?>
  <div class="tags">
    <?php foreach ($items as $item) : ?>
      <div class="tag"><?= render($item); ?></div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
