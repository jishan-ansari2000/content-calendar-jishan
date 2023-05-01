<?php
/*
Plugin Name: Content calendar
Author: Imran Qasim
Version: 1.0.0
Description: This plugin is made for Plugin assignment

*/

defined('ABSPATH') || die("You Can't Access This File Directly"); // is code for security purposes if admin use it directly by puting url on server they can't access it 

define('PLUGINS_PATH', plugin_dir_path(__FILE__)); //C:\Users\ASUS\Local Sites\plugin-assignment\app\public\wp-content\plugins\content-calendar/
define('PLUGINS_URL', plugin_dir_url(__FILE__)); //http://plugin-assignment.local/wp-content/plugins/content-calendar/
define('PLUGIN_FILE', __FILE__); 

include PLUGINS_PATH . "inc/ajax.php";
include PLUGINS_PATH . "inc/db.php";

if (!class_exists('content_calendar')) :
    class content_calendar
    {
        public function __construct()
        {
            add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));
            add_action('admin_enqueue_scripts', array($this, 'wp_enqueue_scripts'));

            add_action('admin_menu', array($this,  'add_content_calendar'));
            // add_action('admin_menu', array($this, 'process_form_settings')); // this is created for handling the form
        }
        // 

        
        //  add js and styles to the plugin

        public function wp_enqueue_scripts()
        {
            wp_enqueue_style('cc_plugin_style', PLUGINS_URL . "assets/css/style.css");
            wp_enqueue_script('cc_plugin_script', PLUGINS_URL . "assets/js/custom.js", ['jquery'], "1.0.0", true);
        }

        
        // ADD MENUS IN ADMIN
        public function add_content_calendar() {
            add_menu_page(
                'Content Calendar',
                'Content Calendar',
                'manage_options',
                'content-calendar',
                array($this, 'add_content_calendar_function'),
                $icon_url = '',
                40
            );

            add_submenu_page( 
                'content-calendar', 
                'Schedule Content', 
                'Schedule Content', 
                'manage_options', 
                'schedule-content', 
                array($this, 'schedule_content_function')
            );
            
            add_submenu_page( 
                'content-calendar', 
                'View Schedule', 
                'View Schedule', 
                'manage_options', 
                'view-schedule', 
                array($this, 'view_schedule_function')
            );
        }
        
        public function add_content_calendar_function() {
            ?>
                <h1 style="text-align: center;"><?php esc_html_e(get_admin_page_title()); ?></h1>
            <?php
            print_r(plugin_dir_url(__FILE__));

            $this->schedule_content_function();
            $this->view_schedule_function();
        }

        public function schedule_content_function() {
            include 'partials/content-calendar-jishan-admin-form.php';
        }

        public function view_schedule_function() {
            include 'partials/content-calendar-table.php';
        }

    }

    new content_calendar;

endif;


?>