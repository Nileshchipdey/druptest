<?php
/**
 * @file
 * Promoted content view.
 */
?>
<?php if ($rows) : ?>
  <section class="new new--young-surgeon">
    <h2><?= t('Young surgeon news'); ?></h2>
    <?= $rows; ?>
  </section>
<?php endif; ?>
