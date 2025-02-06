<?php
/**
 * @file
 * Login Page.
 */
?>
<?php $rego_page = variable_get('argo_registrar_enhancements_home'); ?>
<?php if (
  isset($rego_page['rego_page']['text']['value']) &&
  !empty($rego_page['rego_page']['text']['value'])
) : ?>
  <section class="welcome">
    <?php if (
      isset($rego_page['rego_page']['title']) &&
      !empty($rego_page['rego_page']['title'])
    ) : ?>
      <h1><?= check_plain($rego_page['rego_page']['title']); ?></h1>
    <?php endif; ?>
    <?= check_markup($rego_page['rego_page']['text']['value'], (($rego_page['rego_page']['text']['format']) ? $rego_page['rego_page']['text']['format'] : 'filtered_html')); ?>
  </section>
<?php endif; ?>
