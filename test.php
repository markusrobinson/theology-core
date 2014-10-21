<?php

/*
Plugin Name:        Soil
Plugin URI:         http://theology.co/plugins/core/
Description:        Clean up WordPress markup, use relative URLs, nicer search URLs, and disable trackbacks
Version:            0.0.1
Author:             Roots
Author URI:         http://theology.co/

License:            MIT License
License URI:        http://opensource.org/licenses/MIT
*/



function my_login_logo() { ?>
<style type="text/css">
    body.login div#login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/theology-logo.png);
        padding-bottom: 30px;
    }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );



function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/login.css' );
    wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/assets/js/login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );