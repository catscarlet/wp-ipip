<?php

$tpl_path = WP_PLUGIN_DIR.'/wp-ipip/wp-ipip-options.html';

if (!is_readable($tpl_path)) {
    echo 'Cannot read file wp-ipip-options.html at '.getcwd();

    return;
}

$tpl = file_get_contents($tpl_path);

$ipip_data_filepath = '/wp-ipip/ipipdotnet/';
$ipip_data_filename = 'ipipfree.ipdb';
$ipip_data_fullpath = WP_PLUGIN_DIR.$ipip_data_filepath.$ipip_data_filename;

if (is_readable($ipip_data_fullpath)) {
    $ipip_data_status = '<span style="color: green;">检测到 IPIP.net 数据库文件</span>';
} else {
    $ipip_data_status = '<span style="color: red;">未检测到 IPIP.net 数据库文件</span> 于 <code>'.$ipip_data_fullpath.'</code>';
}

$search = ['{{$ipip_data_status}}'];
$replace = [$ipip_data_status];
$echo = str_replace($search, $replace, $tpl);

$search = ['{{$ipip_data_filepath}}'];
$replace = [$ipip_data_filepath];
$echo = str_replace($search, $replace, $echo);

$search = ['{{$ipip_data_filename}}'];
$replace = [$ipip_data_filename];
$echo = str_replace($search, $replace, $echo);

echo $echo;
