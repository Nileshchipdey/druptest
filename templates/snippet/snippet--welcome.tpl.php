<?php
/**
 * @file
 * Welcome.
 */
?>
<?php $welcome = variable_get('argo_registrar_enhancements_home'); ?>
<?php if (
  isset($welcome['welcome']['text']['value']) &&
  !empty($welcome['welcome']['text']['value'])
) : ?>
  <section class="welcome">
    <h1><?= (isset($welcome['welcome']['title']) && !empty($welcome['welcome']['title'])) ? check_plain($welcome['welcome']['title']) : t('Welcome'); ?></h1>
    <?= check_markup($welcome['welcome']['text']['value'], (($welcome['welcome']['text']['format']) ? $welcome['welcome']['text']['format'] : 'basic_html')); ?>
  </section>
<?php endif; ?>
