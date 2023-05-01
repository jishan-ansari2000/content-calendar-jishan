<?php
defined('ABSPATH') || die("Nice Try!");

global $wpdb;
$prefix = $wpdb->prefix;
$table = $prefix . "likesdislikes";
$sql = "DROP TABLE " . $table;
$wpdb->query($sql);