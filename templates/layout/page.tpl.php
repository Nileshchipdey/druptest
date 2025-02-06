<?php
/**
 * @file
 * Page.
 */
?>
<?php include(dirname(__FILE__) . '/../snippet/snippet--header.tpl.php'); ?>
<main>
  <?= (!empty($messages)) ? $messages : ''; ?>
  <?php include(dirname(__FILE__) . '/../snippet/snippet--tabs.tpl.php'); ?>
  <div class="wrapper">
    <?php if (drupal_valid_path(current_path())) : ?>
      <?= (!empty($breadcrumb)) ? $breadcrumb : ''; ?>
      <?= render($page['content']); ?>
    <?php else : ?>
      <?php include(dirname(__FILE__) . '/../snippet/snippet--login-page.tpl.php'); ?>
      <?php include(dirname(__FILE__) . '/../snippet/snippet--login-form.tpl.php'); ?>
    <?php endif; ?>
  </div>
</main>
<?php include(dirname(__FILE__) . '/../snippet/snippet--footer.tpl.php'); ?>
