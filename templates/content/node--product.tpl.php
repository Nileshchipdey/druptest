<?php
/**
 * @file
 * Product feature node.
 */
?>
<?php if ($is_front) : ?>
  <a href="<?= base_path(); ?>stryker-product-information">
    <table class="<?= $node->type; ?>">
      <thead>
        <tr>
          <th>
            <h3><?= $title; ?></h3>
          </th>
        </tr>
      </thead>
      <?php if (isset($content['field_images'])) : ?>
        <tbody>
          <tr>
            <td>
              <?php
                $picture_mapping = picture_mapping_load('product_small');
                $breakpoints     = picture_get_mapping_breakpoints($picture_mapping);
                $rendered_image  = theme_picture([
                  'breakpoints' => $breakpoints,
                  'style_name'  => 'product_small_desktop_1x',
                  'timestamp'   => NULL,
                  'uri'         => $node->field_images['und'][0]['uri'],
                ]);
              ?>
              <?= $rendered_image; ?>
            </td>
          </tr>
        </tbody>
      <?php endif; ?>
    </table>
  </a>
<?php else : ?>
  <table class="<?= $node->type; ?>">
    <thead>
      <tr>
        <th colspan="2">
          <h3><?= $title; ?></h3>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($content['body'])) : ?>
        <tr>
          <?php if (isset($content['body'])) : ?>
            <td class="body"<?= (!isset($content['field_images'])) ? ' colspan="2"' : ''; ?>>
              <?= render($content['body']); ?>
            </td>
          <?php endif; ?>
          <?php if (isset($content['field_images'])) : ?>
            <td class="image">
              <?php
                $picture_mapping = picture_mapping_load('product_large');
                $breakpoints     = picture_get_mapping_breakpoints($picture_mapping);
                $rendered_image  = theme_picture([
                  'breakpoints' => $breakpoints,
                  'style_name'  => 'product_large_desktop_1x',
                  'timestamp'   => NULL,
                  'uri'         => $node->field_images['und'][0]['uri'],
                ]);
              ?>
              <?= $rendered_image; ?>
            </td>
          <?php endif; ?>
        </tr>
      <?php endif; ?>
      <?php if (isset($content['field_downloads'])) : ?>
        <tr>
          <td class="heading" colspan="2">
            <h4><?= t('Downloads'); ?></h4>
          </td>
        </tr>
        <?= render($content['field_downloads']); ?>
      <?php endif; ?>
      <?php if (isset($content['field_images'][1])) : ?>
        <tr>
          <td class="heading" colspan="2">
            <h4><?= t('Images'); ?></h4>
          </td>
        </tr>
        <tr>
          <td class="images" colspan="2">
            <?= render($content['field_images']); ?>
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
<?php endif; ?>
