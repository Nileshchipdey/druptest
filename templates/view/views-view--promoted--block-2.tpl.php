<?php
/**
 * @file
 * Promoted content view.
 */
?>
<?php if ($rows) : ?>
  <section class="new">
    <h2><?= t('What\'s new'); ?></h2>
    <?= $rows; ?>
  </section>
<?php endif; ?>
