<?php
/**
 * @file
 * Product image field.
 */
?>
<?php if (!empty($items)) : ?>
  <div class="images">
    <?php foreach ($items as $item) : ?>
      <?php
        $style          = 'product_lightbox';
        $derivative_uri = image_style_path($style, $item['#item']['uri']);
        $success        = file_exists($derivative_uri) || image_style_create_derivative($style, $item['#item']['uri'], $derivative_uri);
        $image_url      = file_create_url($derivative_uri);;
      ?>
      <a class="image" data-rel="lightcase:node-<?= $element['#object']->nid; ?>" href="<?= $image_url; ?>">
        <?php
          $style          = 'product_thumbnail';
          $derivative_uri = image_style_path($style, $item['#item']['uri']);
          $success        = file_exists($derivative_uri) || image_style_create_derivative($style, $item['#item']['uri'], $derivative_uri);
          $image_url      = file_create_url($derivative_uri);;
        ?>
        <img src="<?= $image_url; ?>" alt="<?= $item['#item']['alt']; ?>">
      </a>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
