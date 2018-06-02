<?php 

// $Id$
/**
 * @file
 * Website specific language selection.
 */

/*
 * 
 * Implementation of hook_form
 *Creating custom tokens Form 

 */
function language_selection_admin_form() {
  $form['allowed_languages'] = array(
    '#type' => 'textarea',
    '#title' => t('Add languages'),
   '#description' => t('The possible values this field can contain. Enter one value per line, in the format key|label. For example https://example.com| Example Site'),
   '#default_value' => variable_get('allowed_languages', DEFAULT_OPTIONS),
   '#resizable' => FALSE,
   '#rows' => 10,
   '#cols' => 65,
  );
 
  return system_settings_form($form);
}