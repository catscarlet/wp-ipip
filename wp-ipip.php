<?php

/*
Plugin Name: WP-IPIP
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: 根据评论IP地址定位物理地址，使用IPIP.net数据库。
Version: 0.1.2
Author: Catscarlet
Author URI: https://www.catscarlet.com
*/

if (!function_exists('add_action')) {
    exit;
}

if (is_admin()) {
    add_action('admin_enqueue_scripts', 'load_wp_ipip_resources');
}

add_action('admin_menu', 'wpipip_add_option_page');

function wpipip_add_option_page()
{
    add_options_page('WP-IPIP 设置页面', 'WP-IPIP 设置', 'manage_options', 'wp-ipip/wp-ipip-options.php');
}

function load_wp_ipip_resources($hook_suffix)
{
    if ($hook_suffix == 'edit-comments.php') {
        wp_register_script('wp-ipip.js', plugin_dir_url(__FILE__).'js/wp-ipip.js', array('jquery'));
        wp_enqueue_script('wp-ipip.js');
        include_once WP_PLUGIN_DIR.'/wp-ipip/17mon/php/IP.class.php';
        add_filter('comment_text', 'wp_ipip', 10, 2);
    }
}

function wp_ipip($comment_text, $comment = null)
{
    if (!$comment) {
        return $comment_text;
    }

    try {
        $results = IP::find($comment->comment_author_IP);
    } catch (Exception $e) {
        $location = 'WP-IPIP Caught exception: '.$e->getMessage();
        $wpipip_e = '<div class="wp-ipip-comment" display="none" id="wp_ipip_perfix_'.$comment->comment_ID.'" style="color:red">'.$location.'</div>';

        echo $wpipip_e;

        return $comment_text;
    }

    if ($results == 'N/A') {
        return $comment_text;
    }

    $location = array();
    foreach ($results as $str) {
        if ($str != null) {
            $location[] = $str;
        }
    }
    $info = implode(',', $location);

    $wpipip = '<div class="wp-ipip-comment" display="none" id="wp-ipip-perfix-'.$comment->comment_ID.'">地址: '.$info.'</div>';

    echo $wpipip;

    return $comment_text;
}
