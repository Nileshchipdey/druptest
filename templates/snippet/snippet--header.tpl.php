<?php
/**
 * @file
 * Page header.
 */
?>
<header>
  <?php if (user_is_logged_in()) : ?>
    <div class="level-zero">
      <div class="wrapper">
        <div class="account-links">
          <?= l(t('My Account'), 'user'); ?>
          <?= l(t('Logout'), 'user/logout'); ?>
        </div>
        <?php $search = module_invoke('search', 'block_view', 'search'); ?>
        <?php if (!empty($search['content'])) : ?>
          <div class="search">
            <?= render($search['content']); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
  <div class="level-one">
    <div class="wrapper">
      <?= l(t('Stryker'), 'https://strykermeded.com', ['attributes' => ['class' => ['stryker-logo'], 'target' => '_blank'], 'external' => TRUE]); ?>
      <?php if ($is_front) : ?>
        <div class="logo">
          <span class="argo"><?= t('Argo'); ?></span>
          <span class="registrar"><?= t('Registrar'); ?></span>
          <span class="tagline"><?= t('Ortho Education'); ?></span>
        </div>
      <?php else : ?>
        <a class="logo" href="<?= $base_path; ?>">
          <span class="argo"><?= t('Argo'); ?></span>
          <span class="registrar"><?= t('Registrar'); ?></span>
          <span class="tagline"><?= t('Ortho Education'); ?></span>
        </a>
      <?php endif; ?>
      <?php if (user_is_logged_in() && !empty($rendered_main_menu)) : ?>
        <a class="menu-toggle" href="javascript:void(0);">
          <span class="lines">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
          </span>
        </a>
      <?php endif; ?>
    </div>
  </div>
  <?php if (user_is_logged_in() && !empty($rendered_main_menu)) : ?>
    <div class="level-two">
      <div class="wrapper">
        <nav>
          <?= $rendered_main_menu; ?>
          <div class="mobile-menu">
            <div class="account-links">
              <?= l(t('My Account'), 'user'); ?>
              <?= l(t('Logout'), 'user/logout'); ?>
            </div>
            <div class="search">
              <?= l(t('Search'), 'search'); ?>
            </div>
          </div>
        </nav>
      </div>
      <?php if (!empty($rendered_main_menu_children)) : ?>
        <div class="sub-menus">
          <?= $rendered_main_menu_children; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</header>
