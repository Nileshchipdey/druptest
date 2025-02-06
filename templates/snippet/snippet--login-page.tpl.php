<?php
/**
 * @file
 * Login Page.
 */
?>
<?php $login_page = variable_get('argo_registrar_enhancements_home'); ?>
<?php if (
  isset($login_page['login_page']['text']['value']) &&
  !empty($login_page['login_page']['text']['value'])
) : ?>
  <section class="welcome">
    <?php if (
      isset($login_page['login_page']['title']) &&
      !empty($login_page['login_page']['title'])
    ) : ?>
      <h1><?= check_plain($login_page['login_page']['title']); ?></h1>
    <?php endif; ?>
    <?= check_markup($login_page['login_page']['text']['value'], (($login_page['login_page']['text']['format']) ? $login_page['login_page']['text']['format'] : 'filtered_html')); ?>
  </section>
<?php endif; ?>
