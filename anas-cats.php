<?php
/*
Plugin Name: anas cats
Plugin URI: https://custom.com/
Description: epam homework 
Version: 1.0
Author: anas
License: GPLv2 or later
Text Domain: events
*/

defined('ABSPATH') or die();

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

include_once (plugin_dir_path(__FILE__) . 'class.anas-cats.php');

if (class_exists('anas_cats')) {
	$anas_cats = new anas_cats();
}

add_action('init', [$anas_cats, 'register']);

register_activation_hook(__FILE__, array($anas_cats, 'my_plugin_activate'));
register_deactivation_hook(__FILE__, array($anas_cats, 'my_plugin_deactivate'));