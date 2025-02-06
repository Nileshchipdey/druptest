<?php
/**
 * @file
 * Upcoming courses view.
 */
?>
<article class="page page-courses">
  <h1><?= t('Upcoming courses'); ?></h1>
  <?php if ($rows) : ?>
    <section class="courses">
      <?= $rows; ?>
    </section>
  <?php endif; ?>
</article>
