<?php
/**
 * @file
 * Login Form.
 */
?>
<?php $login_form = drupal_get_form('user_login'); ?>
<div class="login-form">
  <h2><?= t('Login'); ?></h2>
  <?= drupal_render($login_form); ?>
  <?php if (drupal_valid_path('node/223')) : ?>
    <div class="outreach-award">
      <a href="<?= drupal_get_path_alias('node/223'); ?>">
        <img src="<?= base_path() . drupal_get_path('theme', 'argo_registrar'); ?>/assets/img/optimised/logo--outreach.jpg" alt="<?= t('Orthopaedic Outreach'); ?>">
        <span><?= t('Apply for the Stryker <br>Outreach Travelling Award'); ?></span>
      </a>
    </div>
  <?php endif; ?>
</div>
