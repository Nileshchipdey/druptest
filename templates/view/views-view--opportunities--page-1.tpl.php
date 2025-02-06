<?php
/**
 * @file
 * Opportunities view.
 */
?>
<article class="page page-opportunities">
  <h1><?= t('Opportunities'); ?></h1>
  <?php $terms = taxonomy_term_load_multiple([], ['vid' => 2]); ?>
  <?php if (!empty($terms)) : ?>
    <div class="terms">
      <?php foreach ($terms as $term) : ?>
        <a href="javascript:void(0);" data-tid="<?= $term->tid; ?>"><?= $term->name; ?></a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <?= ($rows) ? $rows : ''; ?>
</article>
