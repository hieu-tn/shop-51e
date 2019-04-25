<?php
/**
 * @package shop51e
 */

acf_add_options_page(array(
  'page_title' => __('Theme Settings','_s'),
  'menu_title' => __('Theme Settings','_s'),
  'menu_slug'  => 'theme-settings',
  'capability' => 'manage_options',
  'redirect' => false
));
