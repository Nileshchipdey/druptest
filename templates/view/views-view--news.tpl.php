<?php
/**
 * @file
 * News view.
 */
?>
<article class="page page-news">
  <h1><?= t('Latest Argo news'); ?></h1>
  <?php if ($rows) : ?>
    <section class="articles">
      <?= $rows; ?>
    </section>
  <?php else : ?>
    <p><?= t('There are currently no news items.'); ?></p>
  <?php endif; ?>
  <?= ($pager) ? $pager : ''; ?>
</article>
