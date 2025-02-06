<?php
/**
 * @file
 * Promoted product feature view.
 */
?>
<?php if ($rows) : ?>
  <section class="product-feature">
    <h2><?= t('Product feature'); ?></h2>
    <?= $rows; ?>
  </section>
<?php endif; ?>
