<?php
/**
 * @file
 * Page footer.
 */
/**
 * Load the footer data.
 * Relies on the Argo Registrar Enhancements module.
 */
$footer = variable_get('argo_registrar_enhancements_footer');
?>
<footer>
  <div class="wrapper">
    <?php if (user_is_logged_in() && !empty($rendered_main_menu)) : ?>
      <section class="navigation">
        <h4><?= t('Navigation'); ?></h4>
        <?= $rendered_main_menu; ?>
      </section>
    <?php endif; ?>
    <?php if (!empty($footer['contact'])) : ?>
      <section class="contact">
        <h4><?= t('Contact'); ?></h4>
        <?= (!empty($footer['contact']['value'])) ? check_markup($footer['contact']['value'], 'basic_html'): ''; ?>
      </section>
    <?php endif; ?>
    <section class="legal">
      <a href="#" class="button"><span class="closed"><?= t('Read More'); ?></span><span class="open"><?= t('Read Less'); ?></span></a>
      <h4><?= t('Legal'); ?></h4>
      <?= (!empty($footer['legal']['value'])) ? check_markup($footer['legal']['value'], 'basic_html'): ''; ?>
    </section>
    <p class="copyright">&copy; <?= date('Y') . ' ' . t('Stryker Australia Pty Ltd. All rights reserved.'); ?> <span class="credit"><?= t('Site by') . ' ' . l('JND', 'https://www.jamesnortondesign.com', ['attributes' => ['target' => '_blank']]); ?></span></p>
  </div>
</footer>
