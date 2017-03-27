<?php

/*
Plugin Name: WP-IPIP
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: 根据评论IP地址定位物理地址，使用IPIP.net数据库。
Version: 0.1
Author: Catscarlet
Author URI: https://www.catscarlet.com
*/

if (!function_exists('add_action')) {
    exit;
}

if (is_admin()) {
    add_action('admin_enqueue_scripts', 'load_wp_ipip_resources');
};

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
    } catch (Exception $wpwp_exception) {
        $location = 'WP-IPIP Caught exception: '.$wpwp_exception->getMessage();
        $wpipip_e = '<div class="wp-ipip-comment" display="none" id="wp_ipip_perfix_'.$comment->comment_ID.'" style="color:red">'.$location.'</div>';

        echo $wpipip_e;

        return $comment_text;
    }

    if ($results == 'N/A') {
        return $comment_text;
    }

    $location = '';
    foreach ($results as $str) {
        if ($location == '') {
            $location = $str;
        } elseif ($str != null) {
            $location = $location.','.$str;
        }
    }

    $wpipip = '<div class="wp-ipip-comment" display="none" id="wp_ipip_perfix_'.$comment->comment_ID.'">地址: '.$location.'</div>';

    echo $wpipip;

    return $comment_text;
}
