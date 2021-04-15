<?php
require_once (plugin_dir_path(__FILE__) . 'class.anas-cats-public.php');
require_once (plugin_dir_path(__FILE__) . 'class.anas-cats-admin.php');


Class anas_cats 
{

	public function register()
	{

		if (class_exists('anas_cats_public')) {
		$anas_cats_public = new anas_cats_public();
		}

		if (class_exists('anas_cats_admin')) {
		$anas_cats_admin = new anas_cats_admin();
		}

		$anas_cats_public->register();
		$anas_cats_admin->register();
	}
	public static function my_plugin_activate()
    {
 
    }

    public static function my_plugin_deactivate()
    {
 
    }

}