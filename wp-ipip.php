<?php

/*
Plugin Name: WP-IPIP
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: 根据评论 IP 地址定位物理地址，使用 IPIP.net 数据库。
Version: 3.0.2
Author: 石樱灯笼
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
    if ('edit-comments.php' == $hook_suffix) {
        wp_register_script('wp-ipip.js', plugin_dir_url(__FILE__).'js/wp-ipip.js', array('jquery'));
        wp_enqueue_script('wp-ipip.js');
        include_once WP_PLUGIN_DIR.'/wp-ipip/wp-ipip-ipdbloader.php';
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
        $wpipip_e = '<div class="wp-ipip-comment" id="wp-ipip-prefix-'.$comment->comment_ID.'" style="color:red">'.$location.'</div><div class="wp-ipip-mobile-comment" id="wp-ipip-mobile-prefix-'.$comment->comment_ID.'" style="color:red">'.$location.'</div>';

        echo $wpipip_e;

        return $comment_text;
    }

    if ('N/A' == $results) {
        return $comment_text;
    }

    $location = array();
    foreach ($results as $str) {
        if (null != $str) {
            $location[] = $str;
        }
    }

    $info = implode(',', $location);

    $wpipip = '<div class="wp-ipip-comment" id="wp-ipip-prefix-'.$comment->comment_ID.'"><span class="wp-ipip-link-span" ip="'.$comment->comment_author_IP.'" title="点击跳转到 IPIP.net 查看 '.$comment->comment_author_IP.' 详情">地址: '.$info.'</snap></div>';
    $wpipip_mobile =  '<div class="wp-ipip-comment" id="wp-ipip-mobile-prefix-'.$comment->comment_ID.'"><span class="wp-ipip-link-span" ip="'.$comment->comment_author_IP.'" title="点击跳转到 IPIP.net 查看 '.$comment->comment_author_IP.' 详情">地址: '.$info.'</snap></div>';

    echo $wpipip.$wpipip_mobile;

    return $comment_text;
}
