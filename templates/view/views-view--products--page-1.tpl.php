<?php
/**
 * @file
 * Products view.
 */
?>
<article class="page page-products">
  <h1><?= t('Stryker product information'); ?></h1>
  <?php $intro = variable_get('argo_registrar_enhancements_products'); ?>
  <?php if (
    isset($intro['introduction']['value']) &&
    !empty($intro['introduction']['value'])
  ) : ?>
    <section class="introduction">
      <?= check_markup($intro['introduction']['value'], (($intro['introduction']['format']) ? $intro['introduction']['format'] : 'filtered_html')); ?>
    </section>
  <?php endif; ?>
  <?php if ($rows) : ?>
    <h2><?= t('Product focus'); ?></h2>
    <section class="products">
      <?= $rows; ?>
    </section>
  <?php endif; ?>
</article>
