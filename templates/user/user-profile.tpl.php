<?php
/**
 * @file
 * User profile.
 */
?>
<?php $account = menu_get_object('user'); ?>
<article class="page page-user page-account">
  <h1><?= $account->name; ?></h1>
  <div class="actions">
    <?= l(t('View Account'), 'user/' . $account->uid, ['attributes' => ['class' => ['active']]]); ?>
    <?= l(t('Edit Account'), 'user/' . $account->uid .'/edit', ['attributes' => ['data-no-transition' => ($is_admin) ? 'true' : 'false']]); ?>
    <?= l(t('Logout'), 'user/logout'); ?>
  </div>
  <div class="content">
    <section class="profile">
      <h2><?= t('Profile'); ?></h2>
      <?php foreach ($account as $key => $field) : ?>
        <?php if (
          substr($key, 0, strlen('field_')) === 'field_' &&
          !in_array($key, ['field_heard', 'field_tandcs']) &&
          !empty($field)
        ) : ?>
          <div class="form-item form-type-item">
            <label>
              <?= ucwords(str_replace('_', ' ', str_replace('field_', '', $key))); ?>:
            </label>
            <?= $field['und'][0]['value']; ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
      <div class="form-item form-type-item">
        <label><?= t('Email'); ?>:</label>
        <?= $account->mail; ?>
      </div>
      <div class="form-item form-type-item">
        <label><?= t('Member for'); ?>:</label>
        <?= format_interval(time() - $account->created); ?>
      </div>
    </section>
  </div>
</article>
