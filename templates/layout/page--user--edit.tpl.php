<?php
/**
 * @file
 * User Edit Page.
 */
?>
<?php $account = menu_get_object('user'); ?>
<?php include(dirname(__FILE__) . '/../snippet/snippet--header.tpl.php'); ?>
<main>
  <?= (!empty($messages)) ? $messages : ''; ?>
  <div class="wrapper">
    <article class="page page-user page-account">
      <h1><?= t('Edit Your Account'); ?></h1>
      <div class="actions">
        <?= l(t('View Account'), 'user/' . $account->uid); ?>
        <?= l(t('Edit Account'), 'user/' . $account->uid .'/edit', ['attributes' => ['class' => ['active']]]); ?>
        <?= l(t('Logout'), 'user/logout'); ?>
      </div>
      <?= render($page['content']); ?>
    </article>
  </div>
</main>
<?php include(dirname(__FILE__) . '/../snippet/snippet--footer.tpl.php'); ?>