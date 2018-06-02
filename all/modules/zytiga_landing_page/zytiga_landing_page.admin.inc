<?php
// $Id: zytiga_landing_page.admin.inc,v 1.11.2.26 2011/01/25 15:45:50 sun Exp $

function zytiga_landing_page_settings_form() {
	global $countries;
	$country_sites = variable_get('country_sites', '');
	$country_sites = unserialize($country_sites);
	$form['countries'] = array(
		'#type' => 'fieldset',
		'#collapsable' => FALSE,
		'#theme' => 'zytiga_settings_form',
		'#description' => t('Select the countries which have the seperate sites and give the URL of the site in corresponding text boxes.'),
		'#prefix' => '<div id="countries-list">',
		'#suffix' => '</div>',
	);
	foreach($countries as $cid => $country) {
		$form['countries'][$cid][$cid] = array(
			'#type' => 'checkbox',
			'#title' => $country,
			'#default_value' => $country_sites[$cid]['site'],
		);
		$form['countries'][$cid][$cid.'_url'] = array(
			'#type' => 'textfield',
			'#default_value' => $country_sites[$cid]['url'],
		);
		$form['countries'][$cid][$cid.'_released_by'] = array(
			'#type' => 'textfield',
			'#default_value' => $country_sites[$cid]['released_by'],
			'#size' => 10,
			'#maxlength' => 7,
		);
	}
	$form['save'] = array(
		'#type' => 'submit',
		'#value' => t('Save Configuration'),
	);
	
	return $form;
}

function zytiga_landing_page_settings_form_validate($form, $form_state) {
	global $countries;
	foreach($countries as $cid => $country) {
		if($form_state['values'][$cid] == 1 && $form_state['values'][$cid.'_url'] == '') {
			form_set_error($cid.'_url', t("URL shouldn't be empty for the country @country", array('@country' => $country)));
		}
	}
}

function zytiga_landing_page_settings_form_submit($form, &$form_state) {
	global $countries;
	$country_sites = array();
	foreach($countries as $cid => $country) {
		$country_sites[$cid]['site'] = $form_state['values'][$cid];
		$country_sites[$cid]['url'] = ($form_state['values'][$cid] == 1) ? $form_state['values'][$cid.'_url'] : '';
		$country_sites[$cid]['released_by'] = ($form_state['values'][$cid] == 0) ? $form_state['values'][$cid.'_released_by'] : '';
	}
	variable_set('country_sites', serialize($country_sites));
	drupal_set_message(t('The configuration options have been saved.'));
}
