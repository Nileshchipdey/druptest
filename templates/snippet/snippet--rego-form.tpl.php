<?php
/**
 * @file
 * Login Form.
 */
?>
<?php $login_form = drupal_get_form('user_register_form'); ?>
<div class="rego-form">
  <h2><?= t('New Registration'); ?></h2>
  <p><?= t('Fill out the following form to join the program. Fields marked with an* are mandatory.'); ?></p>
  <?= drupal_render($login_form); ?>
</div>
