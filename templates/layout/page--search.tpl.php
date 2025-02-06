<?php
/**
 * @file
 * Search page.
 */
?>
<?php include(dirname(__FILE__) . '/../snippet/snippet--header.tpl.php'); ?>
<main>
  <?= (!empty($messages)) ? $messages : ''; ?>
  <?php include(dirname(__FILE__) . '/../snippet/snippet--tabs.tpl.php'); ?>
  <div class="wrapper">
    <?php if (user_is_logged_in()) : ?>
      <?= (!empty($breadcrumb)) ? $breadcrumb : ''; ?>
      <article class="page page-search">
        <h1><?= t('Search'); ?></h1>
        <?= render($page['content']); ?>
      </article>
    <?php else : ?>
      <?php include(dirname(__FILE__) . '/../snippet/snippet--login-page.tpl.php'); ?>
      <?php include(dirname(__FILE__) . '/../snippet/snippet--login-form.tpl.php'); ?>
    <?php endif; ?>
  </div>
</main>
<?php include(dirname(__FILE__) . '/../snippet/snippet--footer.tpl.php'); ?>
