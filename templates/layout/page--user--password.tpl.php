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
    <h1><?= t('Request a New Password'); ?></h1>
    <?= render($page['content']); ?>
  </div>
</main>
<?php include(dirname(__FILE__) . '/../snippet/snippet--footer.tpl.php'); ?>
