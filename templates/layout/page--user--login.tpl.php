<?php
/**
 * @file
 * Page.
 */
?>
<?php include(dirname(__FILE__) . '/../snippet/snippet--header.tpl.php'); ?>
<main>
  <?= (!empty($messages)) ? $messages : ''; ?>
  <div class="wrapper">
    <?php include(dirname(__FILE__) . '/../snippet/snippet--login-page.tpl.php'); ?>
    <?php include(dirname(__FILE__) . '/../snippet/snippet--login-form.tpl.php'); ?>
  </div>
</main>
<?php include(dirname(__FILE__) . '/../snippet/snippet--footer.tpl.php'); ?>
