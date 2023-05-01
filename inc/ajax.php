<?php

defined('ABSPATH') || die("Nice Try"); 

add_action("wp_ajax_my_ajax_action", 'pwspk_ajax_action'); 

function pwspk_ajax_action()
{
    global $wpdb;
    
    if (isset($_POST['date']) && isset($_POST['occasion']) && isset($_POST['post_title'])&& isset($_POST['author']) && isset($_POST['reviewer'])) {

        $table_name = $wpdb->prefix . 'contentCalender';

        $date = sanitize_text_field($_POST['date']);
        $occasion = sanitize_text_field($_POST['occasion']);
        $post_title = sanitize_text_field($_POST['post_title']);
        $author  = sanitize_text_field($_POST['author']);
        $reviewer = sanitize_text_field($_POST['reviewer']);

        $data = array(
            'date' => $date,
            'occasion' => $occasion,
            'post_title' => $post_title,
            'author' => $author,
            'reviewer' => $reviewer
        );

        $wpdb->insert(
            $table_name,
            $data
        );

        echo "Field Successfully updated....................";
    } else {
        echo "Error Updating Field....................";
    }
    
    wp_die();
}