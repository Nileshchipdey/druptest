<?php
/**
 * @file
 * Event download field.
 */
?>
<?= l(t('<i class="fas fa-download"></i> Download the brochure'), file_create_url($items[0]['#file']->uri), ['attributes' => ['target' => '_blank'], 'html' => TRUE]); ?>
