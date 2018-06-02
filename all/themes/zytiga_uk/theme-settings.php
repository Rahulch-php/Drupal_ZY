<?php
/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @param $subtheme_defaults
 *   Allow a subtheme to override the default values.
 * @return
 *   A form array.
 */
function zytiga_uk_settings($saved_settings) {
	
  // Get the default values from the .info file.
  $defaults = theme_get_settings('zytiga_uk');

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);
  
  /*
   * Create the form using Forms API
   */

  $form['breadcrumb'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Breadcrumb settings'),
    '#attributes'    => array('id' => 'zytiga-breadcrumb'),
  );
  $form['breadcrumb']['zytiga_breadcrumb'] = array(
    '#type'          => 'select',
    '#title'         => t('Display breadcrumb'),
    '#default_value' => $settings['zytiga_breadcrumb'],
    '#options'       => array(
                          'yes'   => t('Yes'),
                          'admin' => t('Only in admin section'),
                          'no'    => t('No'),
                        ),
  );
  $form['breadcrumb']['zytiga_breadcrumb_separator'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Breadcrumb separator'),
    '#description'   => t('Text only. Don’t forget to include spaces.'),
    '#default_value' => $settings['zytiga_breadcrumb_separator'],
    '#size'          => 5,
    '#maxlength'     => 10,
    '#prefix'        => '<div id="div-zytiga-breadcrumb-collapse">', // jquery hook to show/hide optional widgets
  );
  $form['breadcrumb']['zytiga_breadcrumb_home'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show home page link in breadcrumb'),
    '#default_value' => $settings['zytiga_breadcrumb_home'],
  );
  $form['breadcrumb']['zytiga_breadcrumb_trailing'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append a separator to the end of the breadcrumb'),
    '#default_value' => $settings['zytiga_breadcrumb_trailing'],
    '#description'   => t('Useful when the breadcrumb is placed just before the title.'),
  );
  $form['breadcrumb']['zytiga_breadcrumb_title'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append the content title to the end of the breadcrumb'),
    '#default_value' => $settings['zytiga_breadcrumb_title'],
    '#description'   => t('Useful when the breadcrumb is not placed just before the title.'),
    '#suffix'        => '</div>', // #div-zytiga-breadcrumb
  );

  // Return the form
  return $form;
}
