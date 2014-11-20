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
define( 'VERSION', '0.0.1');


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
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
        remove_action( 'welcome_panel', 'wp_welcome_panel' );

    }
    add_action( 'admin_init', 'remove_dashboard_meta' );

    function login_stylesheet() {
        wp_enqueue_style( 'custom-login', PLUGIN_URL . '/assets/css/login.css' );
        wp_enqueue_script( 'custom-login', PLUGIN_URL . '/assets/js/login.js' );
    }
    add_action( 'login_enqueue_scripts', 'login_stylesheet' );

    function customize_admin_bar_links() {

        global $wp_admin_bar;
    //$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
    $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
    $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
    $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
    $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
    $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
    $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
    $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
    $wp_admin_bar->remove_menu('updates');          // Remove the updates link
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    //$wp_admin_bar->remove_menu('new-content');      // Remove the content link
    //$wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
    //$wp_admin_bar->remove_menu('my-account');       // Remove the user details tab

    $wp_admin_bar->add_menu( array(
        'parent' => false,
        'id' => 'edit',
        'title' => __('Edit')
    ));

    $wp_admin_bar->add_menu( array(
        'parent' => 'edit',
        'id' => 'post',
        'title' => __('Posts'),
        'href' => 'edit.php'
    ));
    $wp_admin_bar->add_menu( array(
        'parent' => 'edit',
        'id' => 'pages',
        'title' => __('Pages'),
        'href' => 'edit.php?post_type=page'
    ));
    $wp_admin_bar->add_menu( array(
        'parent' => 'edit',
        'id' => 'media',
        'title' => __('Media'),
        'href' => 'upload.php'
    ));

    $wp_admin_bar->add_menu( array(
        'parent' => false,
        'id' => 'manage',
        'title' => __('Manage')
    ));

    $wp_admin_bar->add_menu(array(
        'parent' => 'manage',
        'id' => 'comments',
        'title' => __('Comments'),
        'href' => 'edit-comments.php'
    ));

    $wp_admin_bar->add_menu( array(
        'parent' => false,
        'id' => 'help',
        'title' => __('Help')
    ));
}
    add_action( 'wp_before_admin_bar_render', 'customize_admin_bar_links' );



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

    function admin_theme_style() {
        wp_enqueue_style('theology-theme-foundation', PLUGIN_URL . 'assets/css/general_foundicons.css', array(), VERSION);
        wp_enqueue_style('theology-theme-foundation-ie', PLUGIN_URL . 'assets/css/general_foundicons_ie7.css', array(), VERSION);
        wp_enqueue_style('theology-theme-foundation-include', PLUGIN_URL . 'assets/css/foundation-icons.css', array(), VERSION);
        wp_enqueue_style('theology-theme-style', PLUGIN_URL . 'assets/css/style.css', array(), VERSION);
        wp_enqueue_style('theology-admin-bar', PLUGIN_URL . 'assets/css/admin-bar.css', array(), VERSION);
        wp_enqueue_style('theology-admin', PLUGIN_URL . 'assets/css/admin.css', array(), VERSION);
        wp_enqueue_style('theology-buttons', PLUGIN_URL . 'assets/css/buttons.css', array(), VERSION);

    }
    add_action('admin_enqueue_scripts', 'admin_theme_style');

    function wp_admin_dashboard_remove_menus() {
        global $menu;
        //$restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
        $restricted = array(__('Appearance'), __('Media'), __('Plugins'), __('Settings'));
        end ($menu);
        while (prev($menu)){
            $value = explode(' ',$menu[key($menu)][0]);
            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
        }
    }
    add_action('admin_menu', 'wp_admin_dashboard_remove_menus');

    function custom_dashboard_widgets() {
        global $wp_meta_boxes;
        wp_add_dashboard_widget('custom_ad_widget', 'MyAds', 'custom_dashboard_ad');
    }

    function custom_dashboard_ad() {
        echo '<p> Here is my widget.</p><br /> And one more line';
    }

    add_action('wp_dashboard_setup', 'custom_dashboard_widgets');

    function remove_footer_admin () {
        echo "Your own text";
    }
    //add_filter('admin_footer_text', 'remove_footer_admin');

    // Hook for adding admin menus
    add_action('admin_menu', 'mt_add_pages');

    // action function for above hook
    function mt_add_pages() {
    // Add a new submenu under Settings:
    add_options_page(__('Test Settings','menu-test'), __('Test Settings','menu-test'), 'manage_options', 'testsettings', 'mt_settings_page');

    // Add a new submenu under Tools:
    add_management_page( __('Test Tools','menu-test'), __('Test Tools','menu-test'), 'manage_options', 'testtools', 'mt_tools_page');

    // Add a new top-level menu (ill-advised):
    add_menu_page(__('Test Toplevel','menu-test'), __('Test Toplevel','menu-test'), 'manage_options', 'mt-top-level-handle', 'mt_toplevel_page' );

    // Add a submenu to the custom top-level menu:
    add_submenu_page('mt-top-level-handle', __('Test Sublevel','menu-test'), __('Test Sublevel','menu-test'), 'manage_options', 'sub-page', 'mt_sublevel_page');

    // Add a second submenu to the custom top-level menu:
    add_submenu_page('mt-top-level-handle', __('Test Sublevel 2','menu-test'), __('Test Sublevel 2','menu-test'), 'manage_options', 'sub-page2', 'mt_sublevel_page2');
}

    // mt_settings_page() displays the page content for the Test settings submenu
    function mt_settings_page() {
        echo "<h2>" . __( 'Test Settings', 'menu-test' ) . "</h2>";
    }

    // mt_tools_page() displays the page content for the Test Tools submenu
    function mt_tools_page() {
        echo "<h2>" . __( 'Test Tools', 'menu-test' ) . "</h2>";
    }

    // mt_toplevel_page() displays the page content for the custom Test Toplevel menu
    function mt_toplevel_page() {
        echo "<h2>" . __( 'Test Toplevel', 'menu-test' ) . "</h2>";
    }

    // mt_sublevel_page() displays the page content for the first submenu
    // of the custom Test Toplevel menu
    function mt_sublevel_page() {
        echo "<h2>" . __( 'Test Sublevel', 'menu-test' ) . "</h2>";
    }

    // mt_sublevel_page2() displays the page content for the second submenu
    // of the custom Test Toplevel menu
    function mt_sublevel_page2() {
        echo "<h2>" . __( 'Test Sublevel2', 'menu-test' ) . "</h2>";
    }

?>