<?php
/**
 * @file
 * Past courses view.
 */
?>
<article class="page page-courses page-courses-past">
  <h1><?= t('Past courses'); ?></h1>
  <p><?= t('The following past courses are ordered by date.'); ?></p>
  <?php if ($rows) : ?>
    <section class="courses">
      <?= $rows; ?>
    </section>
  <?php endif; ?>
</article>
