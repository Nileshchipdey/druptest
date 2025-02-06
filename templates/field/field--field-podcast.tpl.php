<?php
/**
 * @file
 * Event podcast field.
 */
?>
<?= l(t('<i class="fas fa-podcast"></i> Download the podcast'), file_create_url($items[0]['#file']->uri), ['attributes' => ['target' => '_blank'], 'html' => TRUE]); ?>
