<?php
/**
 * @file
 * Front page.
 */
?>
<?php include(dirname(__FILE__) . '/../snippet/snippet--header.tpl.php'); ?>
<main>
  <?= (!empty($messages)) ? $messages : ''; ?>
  <?php include(dirname(__FILE__) . '/../snippet/snippet--tabs.tpl.php'); ?>
  <div class="wrapper">
    <?php if (user_is_logged_in()) : ?>
      <?php $whats_new = module_invoke('views', 'block_view', 'promoted-block_2'); ?>
      <?= (!empty($whats_new['content'])) ? render($whats_new['content']) : ''; ?>
      <?php $young_surgeon = module_invoke('views', 'block_view', 'promoted-block_3'); ?>
      <?= (!empty($young_surgeon['content'])) ? render($young_surgeon['content']) : ''; ?>
      <?php $featured_product = module_invoke('views', 'block_view', 'products-block'); ?>
      <?= (!empty($featured_product['content'])) ? render($featured_product['content']) : ''; ?>
      <?php include(dirname(__FILE__) . '/../snippet/snippet--welcome.tpl.php'); ?>
    <?php else : ?>
      <?php include(dirname(__FILE__) . '/../snippet/snippet--login-page.tpl.php'); ?>
      <?php include(dirname(__FILE__) . '/../snippet/snippet--login-form.tpl.php'); ?>
    <?php endif; ?>
  </div>
</main>
<?php include(dirname(__FILE__) . '/../snippet/snippet--footer.tpl.php'); ?>
