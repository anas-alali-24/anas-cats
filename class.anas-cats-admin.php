<?php

Class anas_cats_admin 
{
    //admin scripts
    public function enqueue_admin_scripts()
    {
        wp_enqueue_style('anas_cats_admin_style', plugins_url('/admin/assets/style.css', __FILE__));
        wp_enqueue_script('anas_cats_admin_script', plugins_url('/admin/assets/main.js', __FILE__));
    }

    //admin menu
    public function add_admin_menu()
    {
        add_menu_page(
            'anas_cats Settings',
            'anas_cats Settings',
            'administrator',
            'anas_cats_settings',
            [$this, 'admin_menu_page'],
            'dashicons-buddicons-activity',
            8);
    }

    //admin page
    public function admin_menu_page()
    {
        if (isset($_POST['anas_cats_api_key'])) {
            update_option('anas_cats_api_key', $_POST['anas_cats_api_key']);
            echo 'dasdasda';
        }

        $key = get_option('anas_cats_api_key', '');
        include_once plugin_dir_path(__FILE__) . 'admin/templates/admin_menu_page.php';

    }

    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);

        add_action('admin_menu', [$this, 'add_admin_menu']);

        //add_action('rest_api_init', [$this, 'rest_api_init_route']);


    }
}