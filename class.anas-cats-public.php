<?php

Class anas_cats_public 
{
    //public scripts
    public function enqueue_public_scripts()
    {
        wp_enqueue_style('anas_cats_public_style', plugins_url('/public/assets/pstyle.css', __FILE__));
        wp_enqueue_script('anas_cats_public_script', plugins_url('/public/assets/main.js', __FILE__));
    }

    //public outpot
    public function display_anas_cats_short_code()
    {
        if($key = get_option('anas_cats_api_key', '')) {
            $url = '';
            $selected = '';
            if(isset($_POST['selected-breed'])){
                $selected = $_POST['selected-breed'];
                $url = $this->call_cat_api($selected , $key);
            }
        }
        else {
            $err='Please set the api access key on addmin page';
        } 

        ob_start();

        include_once (plugin_dir_path(__FILE__) . '/public/templates/display-cats-form-template.php');

        return ob_get_clean();
    }
    //api function
    function call_cat_api( string $breed, string $key)
    {
        $args = array(
            'headers' => array(
              'x-api-key' => $key,
            )
         );
         $response = wp_remote_get('https://api.thecatapi.com/v1/images/search?breed_ids=' . $breed,$args);
         $responseBody = wp_remote_retrieve_body( $response );
         $result = json_decode( $responseBody,true);
         return $result[0]['url'] ;
    }

    public function register()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_public_scripts']);

        add_shortcode('show_cats', [$this, 'display_anas_cats_short_code']);

    }
}