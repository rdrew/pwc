<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * pwc theme.
 */


//######################
// Manipulation of menus
//######################


//main menu (top) using the menu block module
function pwc_menu_tree__main_menu(&$variables) {
    return '<ul class="main-menu__items dropdown menu" data-dropdown-menu>' . $variables['tree'] . '</ul>';
}
function pwc_menu_tree__menu_block__1(&$variables) {
    return '<ul class="main-menu__items dropdown menu" data-dropdown-menu>' . $variables['tree'] . '</ul>';
}
//main menu (top) using the menu block module
function pwc_menu_tree__menu_block__2(&$variables) {
    return '<ul class="main-menu__items dropdown menu" data-dropdown-menu>' . $variables['tree'] . '</ul>';
}
function pwc_menu_tree__menu_landing_page_block_menu(&$variables) {
    return '<ul class="lp-block-menu">' . $variables['tree'] . '</ul>';
}

function pwc_form_alter(&$form, &$form_state, $form_id) {
	// target a single form
	if($form_id == "search_block_form"){
 $form['search_block_form']['#title'] = t('Search the archives...'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 40;  // define size of the textfield
    //$form['search_block_form']['#default_value'] = t('Search the archives...'); // Set a default value for the textfield
    $form['actions']['submit']['#value'] = t('GO!'); // Change the text on the submit button
    $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/Magnifying_glass_icon.svg');

    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search the archives...';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search the archives...') {this.value = '';}";
    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search the archives...'){ alert('Please enter a search'); return false; }";

    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['search_block_form']['#attributes']['placeholder'] = t('Search the archives...');
	}
	if($form_id == "islandora_solr_simple_search_form"){
		$form['simple']['islandora_simple_search_query']['#default_value'] = t('Search the archives...'); // Set a default value for the textfield
		$form['simple']['islandora_simple_search_query']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search the archives...';}";
		$form['simple']['islandora_simple_search_query']['#attributes']['onfocus'] = "if (this.value == 'Search the archives...') {this.value = '';}";
	}
}


