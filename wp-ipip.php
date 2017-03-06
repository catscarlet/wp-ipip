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
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

if (is_admin()) {
    add_action('admin_enqueue_scripts', 'load_wp_ipip_resources');
};

function load_wp_ipip_resources($hook_suffix)
{
    $h = print_r($hook_suffix, true);
    if ($hook_suffix == 'edit-comments.php') {
        wp_register_script('wp-ipip.js', plugin_dir_url(__FILE__).'js/wp-ipip.js?h='.$h, array('jquery'));
        wp_enqueue_script('wp-ipip.js');
        include_once WP_PLUGIN_DIR.'/wp-ipip/17mon/php/IP.class.php';
        add_filter('comment_text', 'wp_ipip', 10, 2);
    }
}

function wp_ipip($comment_text, $comment = null)
{
    try {
        $results = IP::find($comment->comment_author_IP);
    } catch (Exception $e) {
        $location = 'WP-IPIP Caught exception: '.$e->getMessage();
        originCommentTextOutput($comment_text);
        echo '<div class="wp-ipip-test" display="none" commentid="'.$comment->comment_ID.'">地址: '.$location.'</div>';
        return;
    }

    $location = '';
    foreach ($results as $str) {
        if ($location == '') {
            $location = $str;
        }
        if ($str != null) {
            $location = $location.','.$str;
        }
    }

    $wpipip = '<div class="wp-ipip-test" display="none" commentid="'.$comment->comment_ID.'">地址: '.$location.'</div>';

    originCommentTextOutput($comment_text);

    echo $wpipip;
}

function originCommentTextOutput($comment_text) {
    if (function_exists('wpua_custom_output')) {
        echo '<div class="wp-useragent">';
        wpua_custom_output();
        echo '</div>';
    }

    echo "<p>$comment_text</p>";
}
