<?php
/**
 * @file
 * Past event field.
 */
?>
<?= l(t('<i class="fas fa-clock"></i> View past event'), 'past-courses', ['fragment' => $element['#object']->field_past_event['und'][0]['nid'], 'html' => TRUE]); ?>
