<?php
defined('ABSPATH') || die('Nice Try');

// "CREATE TABLE `wp_likesdislikes` (
//     `id` int(11) NOT NULL,
//     `user_id` int(11) DEFAULT NULL,
//     `post_id` int(11) DEFAULT NULL,
//     `like` int(11) DEFAULT NULL,
//     `dislike` int(11) DEFAULT NULL,
//     `date_added` timestamp NULL DEFAULT NULL,
//     PRIMARY KEY (`id`)
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8"

register_activation_hook(PLUGIN_FILE, function () {
    global $wpdb;
    $prefix = $wpdb->prefix;
    $collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS `{$prefix}contentCalender` (
        `id` int(11) AUTO_INCREMENT,
        `date` date NOT NULL,
        `occasion` varchar(100) NOT NULL,
        `post_title` varchar(100) NOT NULL,
        `author` varchar(100) NOT NULL,
        `reviewer` varchar(100) NOT NULL,
        PRIMARY KEY (`id`)
    ) {$collate};";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
});

register_deactivation_hook(PLUGIN_FILE, function () {
    global $wpdb;
    $prefix = $wpdb->prefix;
    $table = $prefix . "contentCalender";
    $sql = "TRUNCATE TABLE " . $table;
    $wpdb->query($sql);
});
