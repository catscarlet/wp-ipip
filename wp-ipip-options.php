<?php

$tplpath = WP_PLUGIN_DIR.'/wp-ipip/wp-ipip-options.html';

if (!is_readable($tplpath)) {
    echo 'Cannot read file wp-ipip-options.html at '.getcwd();

    return;
}
$tpl = file_get_contents($tplpath);

$ipip_data_filepath = WP_PLUGIN_DIR.'/wp-ipip/17mon/php/17monipdb.dat';

if (is_readable($ipip_data_filepath)) {
    $ipip_data_status = '<span style="color: green;">检测到IPIP数据库文件</span>';
} else {
    $ipip_data_status = '<span style="color: red;">未检测到IPIP数据库文件</span> 于 <code>'.$ipip_data_filepath.'</code>';
}

$search = ['{{$ipip_data_status}}'];
$replace = [$ipip_data_status];

$echo = str_replace($search, $replace, $tpl);

echo $echo;