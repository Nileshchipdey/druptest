<?php
/**
 * @file
 * Template functions.
 */

/**
 * Implements hook_preprocess_html().
 */
function argo_registrar_preprocess_html(&$vars) {
  $vars['html_attributes_array']         = [];
  $vars['body_attributes_array']         = [];
  $vars['html_attributes_array']['lang'] = $vars['language']->language;
  $vars['html_attributes_array']['dir']  = $vars['language']->dir;
  if (function_exists('rdf_get_namespaces')) {
    $vars['rdf'] = ['prefix' => ''];
    foreach (rdf_get_namespaces() as $prefix => $uri) {
      $vars['rdf']['prefix'] .= "\n" . $prefix . ': ' . $uri;
    }
  }
  $vars['body_attributes_array']['class'] = $vars['classes_array'];
  $vars['body_attributes_array']         += $vars['attributes_array'];
  $vars['attributes_array']               = '';
}

/**
 * Implements hook_process_html().
 */
function argo_registrar_process_html(&$vars) {
  $vars['html_attributes'] = drupal_attributes($vars['html_attributes_array']);
  $vars['body_attributes'] = drupal_attributes($vars['body_attributes_array']);
  if (isset($vars['rdf'])) {
    $vars['rdf_namespaces'] = drupal_attributes($vars['rdf']);
  }
  $vars['head_scripts'] = drupal_get_js('head_scripts');
}

/**
 * Implements hook_html_head_alter().
 */
function argo_registrar_html_head_alter(&$head_elements) {
  // Add charset attribute.
  $head_elements['system_meta_content_type']['#attributes'] = ['charset' => 'utf-8'];
}

/**
 * Implements theme_select().
 */
function argo_registrar_select($variables) {
  // Add wrapping div for styling.
  $element = $variables['element'];
  element_set_attributes($element, ['id', 'name', 'size']);
  _form_set_class($element, ['form-select']);
  return '<div class="custom-select"><select' . drupal_attributes($element['#attributes']) . '>' . form_select_options($element) . '</select></div>';
}

/**
 * Implements hook_preprocess_hook().
 */
function argo_registrar_preprocess_image(&$variables) {
  // Add itemprop attribute to image tags.
  $variables['attributes']['itemprop'] = ['image'];
}

/**
 * Check User is Anonymous and on User Page for display of tabs.
 */
function tab_check() {
  $path = request_path();
  if (in_array($path, [
    'user',
    'user/login',
    'user/register',
    'user/password',
  ]) && user_is_anonymous()) {
    return TRUE;
  }
  else {
    return FALSE;
  }
}

/**
 * Get referrer url.
 */
function argo_registrar_referrer_url() {
  $params       = drupal_get_query_parameters();
  $referrer_url = '';
  foreach ($params as $key => $param) {
    if ($key == 'referrer') {
      $referrer_url .= $param;
    }
    else {
      if (is_array($param)) {
        foreach ($param as $param_key => $param_param) {
          $referrer_url .= '&' . $key . '[' . $param_key . ']' . '=' . $param_param;
        }
      }
      else {
        $referrer_url .= '&' . $key . '=' . $param;
      }
    }
  }
  return $referrer_url;
}

/**
 * Generate share links.
 */
function argo_registrar_share_links() {
  $node = menu_get_object();
  if (!empty($node)) {
    $share_data                = [];
    $share_data['share_title'] = urlencode($node->title);
    $share_protocol            = 'http://';
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
      $share_protocol = 'https://';
    }
    $share_data['share_url'] = urlencode($share_protocol . $_SERVER['HTTP_HOST'] . preg_replace('/\\?.*/', '', $_SERVER['REQUEST_URI']));
    if (isset($node->field_image) && !empty($node->field_image)) {
      $share_data['share_image'] = file_create_url($node->field_image['und'][0]['uri']);
    }
    elseif (isset($node->field_images) && !empty($node->field_images)) {
      $share_data['share_image'] = file_create_url($node->field_images['und'][0]['uri']);
    }
    return $share_data;
  }
  else {
    $share_data                = [];
    $share_data['share_title'] = urlencode(drupal_get_title());
    $share_protocol            = 'http://';
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
      $share_protocol = 'https://';
    }
    $share_data['share_url'] = urlencode($share_protocol . $_SERVER['HTTP_HOST'] . preg_replace('/\\?.*/', '', $_SERVER['REQUEST_URI']));
    return $share_data;
  }
  return FALSE;
}

/**
 * Format address field.
 */
function argo_registrar_format_address($address_array, $line_breaks = FALSE, $show_country = TRUE) {
  $address           = '';
  $address_component = 0;
  if (!empty($address_array['thoroughfare'])) {
    $address .= $address_array['thoroughfare'];
    $address_component++;
  }
  if (!empty($address_array['premise'])) {
    if ($address_component > 0) {
      $address .= ', ';
    }
    if ($address_component > 0 && $line_breaks) {
      $address .= '<br>';
    }
    $address .= $address_array['premise'];
    $address_component++;
  }
  if (!empty($address_array['locality'])) {
    if ($address_component > 0) {
      $address .= ', ';
    }
    if ($address_component > 0 && $line_breaks) {
      $address .= '<br>';
    }
    $address .= $address_array['locality'];
    $address_component++;
  }
  if (!empty($address_array['administrative_area'])) {
    if ($address_component > 0) {
      $address .= ' ';
    }
    $address .= $address_array['administrative_area'];
    $address_component++;
  }
  if (!empty($address_array['postal_code'])) {
    if ($address_component > 0) {
      $address .= ' ';
    }
    $address .= $address_array['postal_code'];
    $address_component++;
  }
  if ($show_country && !empty($address_array['country'])) {
    if ($address_component > 0) {
      $address .= ' ';
    }
    if ($address_component > 0 && $line_breaks) {
      $address .= '<br>';
    }
    $address .= ($address_array['country'] == 'AU') ? t('Australia') : $address_array['country'];
    $address_component++;
  }
  return $address;
}

/**
 * Implements hook_form_alter().
 */
function argo_registrar_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#attributes']['placeholder'] = t('Search this site');
    $form['actions']['submit']['#value'] = '';
  }
  if ($form_id == 'search_form') {
    $form['basic']['submit']['#value'] = '';
  }
  if ($form_id == 'user_login') {
    $form['actions']['submit']['#weight'] = 99;
    $form['actions']['join'] = [
      '#markup' => '<div class="register">' . t('Not a member?') . ' ' . l(t('Join now.'), 'user/register') . '</div>',
    ];
    $form['name']['#title']      = t('Username or Email Address');
    unset($form['name']['#description']);
    $form['pass']['#description'] = l(t('Request a new password'), 'user/password');
  }
  if ($form_id == 'user_register_form') {
    $form['account']['name']['#type']    = 'hidden';
    $form['account']['name']['#value']   = NULL;
    $form['actions']['submit']['#value'] = t('Join Now');
    unset($form['account']['pass']['#description']);
    unset($form['campaignmonitor']['#title']);
    unset($form['campaignmonitor']['campaignmonitor_lists']['#description']);
    foreach ($form['campaignmonitor']['campaignmonitor_lists']['#options'] as $key => $option) {
      $form['campaignmonitor']['campaignmonitor_lists']['#options'][$key] = str_replace('** ', '', $option);
    }
    $form['campaignmonitor']['#weight'] = 13;
    array_unshift($form['#validate'], 'argo_registrar_user_register_validate');
  }
  if ($form_id == 'user_profile_form') {
    $form['account']['name']['#type']   = 'hidden';
    $form['account']['name']['#value']  = NULL;
    $form['account']['mail']['#weight'] = -10;
    unset($form['account']['pass']['#description']);
    array_unshift($form['#validate'], 'argo_registrar_user_register_validate');
  }
}

/**
 * Implements theme_preprocess_page().
 */
function argo_registrar_preprocess_page(&$variables) {
  $main_menu_tree                           = menu_tree('main-menu');
  $variables['rendered_main_menu']          = '';
  $variables['rendered_main_menu_children'] = '';
  if (!empty($main_menu_tree)) {
    foreach ($main_menu_tree as $key => $tree_branch) {
      if (isset($tree_branch['#below']) && !empty($tree_branch['#below'])) {
        $variables['rendered_main_menu_children'] .= '<div class="sub-menu" data-href="' . $tree_branch['#href'] . '"><div class="wrapper">' . drupal_render($tree_branch['#below']) . '</div></div>';
        $main_menu_tree[$key]['#localized_options']['attributes']['data-href'] = $tree_branch['#href'];
        unset($main_menu_tree[$key]['#children']);
        unset($main_menu_tree[$key]['#printed']);
      }
    }
    $variables['rendered_main_menu'] = drupal_render($main_menu_tree);
  }
}

/**
 * Implements theme_breadcrumb().
 */
function argo_registrar_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    $output = '<div class="breadcrumb">' . implode(' <span class="separator">/</span> ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Validates the user registration form and
 * generates the username automatically.
 */
function argo_registrar_user_register_validate($form, &$form_state) {
  if (
    isset($form_state['values']['field_first_name']) &&
    !empty($form_state['values']['field_first_name']) &&
    isset($form_state['values']['field_last_name']) &&
    !empty($form_state['values']['field_last_name'])
  ) {
    $username = $form_state['values']['field_first_name']['und'][0]['value'] . ' ' . $form_state['values']['field_last_name']['und'][0]['value'];
    form_set_value($form['account']['name'], $username, $form_state);
  }
}
