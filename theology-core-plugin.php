<?php defined('ABSPATH') or die("No script kiddies please!");
/*
Plugin Name: Theology Core Plugins
Plugin URI: http://theology.co
Description: Theology Core Plugins
Version: 0.1
Author: Markus Robinson
Author URI: http://theology.co
*/


define( 'PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );



class Theology_core {
	var $settings, $options_page;

	function __construct() {

		if (is_admin()) {

		}

        /*
		add_action('init', array($this,'init') );
		add_action('admin_init', array($this,'admin_init') );
		add_action('admin_menu', array($this,'admin_menu') );

		register_activation_hook( __FILE__, array($this,'activate') );
		register_deactivation_hook( __FILE__, array($this,'deactivate') );
        */
	}

} // end class



    function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8

    }
    add_action( 'admin_init', 'remove_dashboard_meta' );

    function my_login_stylesheet() {
        wp_enqueue_style( 'custom-login', PLUGIN_URL . '/assets/css/login.css' );
        wp_enqueue_script( 'custom-login', PLUGIN_URL . '/assets/js/login.js' );
    }

    add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


    remove_action(' welcome_panel ', ' wp_welcome_panel');
/*
    // add new dashboard widgets
    function wptutsplus_add_dashboard_widgets() {
        wp_add_dashboard_widget( 'wptutsplus_dashboard_welcome', 'Welcome', 'wptutsplus_add_welcome_widget' );
        wp_add_dashboard_widget( 'wptutsplus_dashboard_links', 'Useful Links', 'wptutsplus_add_links_widget' );
    }


    function wptutsplus_add_welcome_widget(){ ?>

    This content management system lets you edit the pages and posts on your website.

    Your site consists of the following content, which you can access via the menu on the left:

    <ul>
        <li><strong>Pages</strong> - static pages which you can edit.</li>
        <li><strong>Posts</strong> - news or blog articles - you can edit these and add more.</li>
        <li><strong>Media</strong> - images and documents which you can upload via the Media menu on the left or within each post or page.</li>
    </ul>

    On each editing screen there are instructions to help you add and edit content.

<?php }

    function wptutsplus_add_links_widget() { ?>

    Some links to resources which will help you manage your site:

    <ul>
        <li><a href="http://wordpress.org">The WordPress Codex</a></li>
        <li><a href="http://easywpguide.com">Easy WP Guide</a></li>
        <li><a href="http://www.wpbeginner.com">WP Beginner</a></li>
    </ul>
<?php }
    add_action( 'wp_dashboard_setup', 'wptutsplus_add_dashboard_widgets' );
*/

?>