<?php
/**
 * @file
 * Page tabs.
 */
?>
<?php if (($is_admin || tab_check()) && !empty($tabs['#primary'])) : ?>
  <div class="tabs">
    <?= render($tabs); ?>
  </div>
<?php endif; ?>
